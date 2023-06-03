const { NodeSSH } = require('node-ssh');
const ssh = new NodeSSH();

const parseArguments = () => {
    const args = process.argv.slice(2);

    const options = {};
    args.forEach(arg => {
        const [key, value] = arg.split('=');
        options[key.slice(2)] = value;
    });

    return options;
};


const download = async () => {
    const { host, username, password, path, content } = parseArguments();
    console.log(content);

    if (!host || !username || !password || !path || !content) {
        console.error('Please provide the host, username, password, path and content as arguments.');
        return;
    }

    try {

        await ssh.connect({
            host,
            username,
            password
        });

        const result = await ssh.execCommand(`wget -c --no-check-certificate ${content}`, { cwd: path });
        console.log('STDOUT:', result.stdout);
        console.log('STDERR:', result.stderr);

        ssh.dispose();
    } catch (error) {
        console.error(error);
    }
};

download();

