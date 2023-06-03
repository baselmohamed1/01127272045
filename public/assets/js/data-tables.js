/**
 * DataTables Basic
 */

'use strict';

// let fv, offCanvasEl;
// document.addEventListener('DOMContentLoaded', function (e) {
//   (function () {
//     const formAddNewRecord = document.getElementById('form-add-new-record');

//     setTimeout(() => {
//       const newRecord = document.querySelector('.create-new'),
//         offCanvasElement = document.querySelector('#add-new-record');

//       // To open offCanvas, to add new record
//       if (newRecord) {
//         newRecord.addEventListener('click', function () {
//           offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
//           // Empty fields on offCanvas open
//           (offCanvasElement.querySelector('.dt-full-name').value = ''),
//             (offCanvasElement.querySelector('.dt-post').value = ''),
//             (offCanvasElement.querySelector('.dt-email').value = ''),
//             (offCanvasElement.querySelector('.dt-date').value = ''),
//             (offCanvasElement.querySelector('.dt-salary').value = '');
//           // Open offCanvas with form
//           offCanvasEl.show();
//         });
//       }
//     }, 200);

//     // Form validation for Add new record
//     fv = FormValidation.formValidation(formAddNewRecord, {
//       fields: {
//         basicFullname: {
//           validators: {
//             notEmpty: {
//               message: 'The name is required'
//             }
//           }
//         },
//         basicPost: {
//           validators: {
//             notEmpty: {
//               message: 'Post field is required'
//             }
//           }
//         },
//         basicEmail: {
//           validators: {
//             notEmpty: {
//               message: 'The Email is required'
//             },
//             emailAddress: {
//               message: 'The value is not a valid email address'
//             }
//           }
//         },
//         basicDate: {
//           validators: {
//             notEmpty: {
//               message: 'Joining Date is required'
//             },
//             date: {
//               format: 'MM/DD/YYYY',
//               message: 'The value is not a valid date'
//             }
//           }
//         },
//         basicSalary: {
//           validators: {
//             notEmpty: {
//               message: 'Basic Salary is required'
//             }
//           }
//         }
//       },
//       plugins: {
//         trigger: new FormValidation.plugins.Trigger(),
//         bootstrap5: new FormValidation.plugins.Bootstrap5({
//           // Use this for enabling/changing valid/invalid class
//           // eleInvalidClass: '',
//           eleValidClass: '',
//           rowSelector: '.col-sm-12'
//         }),
//         submitButton: new FormValidation.plugins.SubmitButton(),
//         // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
//         autoFocus: new FormValidation.plugins.AutoFocus()
//       },
//       init: instance => {
//         instance.on('plugins.message.placed', function (e) {
//           if (e.element.parentElement.classList.contains('input-group')) {
//             e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
//           }
//         });
//       }
//     });

//     // FlatPickr Initialization & Validation
//     flatpickr(formAddNewRecord.querySelector('[name="basicDate"]'), {
//       enableTime: false,
//       // See https://flatpickr.js.org/formatting/
//       dateFormat: 'm/d/Y',
//       // After selecting a date, we need to revalidate the field
//       onChange: function () {
//         fv.revalidateField('basicDate');
//       }
//     });
//   })();
// });

// datatable (jquery)
$(function () {
  var dt_basic_table = $('#DataTables_Table_0'),
    dt_basic;

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable();
  }



  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});