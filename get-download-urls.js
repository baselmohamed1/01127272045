const cheerio = require('cheerio')
const axios = require('axios')

const url = process.argv[2]
const cssSelector = process.argv[3]

async function getDownlodURLS() {
    const allLinks = []
    response = await axios.get(url)

    html = response.data
    $ = cheerio.load(html)

    $(cssSelector).each((i, element) => {
        const link = $(element).find('a').attr('href')
        allLinks.push(link)
    });

    console.log(JSON.stringify(allLinks))
}

getDownlodURLS();
