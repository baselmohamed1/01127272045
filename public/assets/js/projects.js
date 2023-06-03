/**
 * Dashboard CRM
 */

 'use strict';
 (function () {
   let cardColor, labelColor, shadeColor, legendColor, borderColor;
     cardColor = config.colors.cardColor;
     labelColor = config.colors.textMuted;
     legendColor = config.colors.bodyColor;
     borderColor = config.colors.borderColor;
     shadeColor = '';
 

 
   // Sales last year Area Chart
   // --------------------------------------------------------------------
   const pagesFoundEl = document.querySelector('#pagesFound'),
     pagesFoundConfig = {
       chart: {
         height: 78,
         type: 'area',
         parentHeightOffset: 0,
         toolbar: {
           show: false
         },
         sparkline: {
           enabled: true
         }
       },
       markers: {
         colors: 'transparent',
         strokeColors: 'transparent'
       },
       grid: {
         show: false
       },
       colors: [config.colors.success],
       fill: {
         type: 'gradient',
         gradient: {
           shade: shadeColor,
           shadeIntensity: 0.8,
           opacityFrom: 0.6,
           opacityTo: 0.25
         }
       },
       dataLabels: {
         enabled: false
       },
       stroke: {
         width: 2,
         curve: 'smooth'
       },
       series: [
         {
           data: [200, 55, 400, 250]
         }
       ],
       xaxis: {
         show: true,
         lines: {
           show: false
         },
         labels: {
           show: false
         },
         stroke: {
           width: 0
         },
         axisBorder: {
           show: false
         }
       },
       yaxis: {
         stroke: {
           width: 0
         },
         show: false
       },
       tooltip: {
         enabled: true
       }
     };
   if (typeof pagesFound !== undefined && pagesFound !== null) {
     const pagesFound = new ApexCharts(pagesFoundEl, pagesFoundConfig);
     pagesFound.render();
   }
 
        // Sales last year Area Chart
   // --------------------------------------------------------------------
   const pagesCrawledEl = document.querySelector('#pagesCrawled'),
     pagesCrawledConfig = {
       chart: {
         height: 78,
         type: 'area',
         parentHeightOffset: 0,
         toolbar: {
           show: false
         },
         sparkline: {
           enabled: true
         }
       },
       markers: {
         colors: 'transparent',
         strokeColors: 'transparent'
       },
       grid: {
         show: false
       },
       colors: [config.colors.success],
       fill: {
         type: 'gradient',
         gradient: {
           shade: shadeColor,
           shadeIntensity: 0.8,
           opacityFrom: 0.6,
           opacityTo: 0.25
         }
       },
       dataLabels: {
         enabled: false
       },
       stroke: {
         width: 2,
         curve: 'smooth'
       },
       series: [
         {
           data: [200, 55, 400, 250]
         }
       ],
       xaxis: {
         show: true,
         lines: {
           show: false
         },
         labels: {
           show: false
         },
         stroke: {
           width: 0
         },
         axisBorder: {
           show: false
         }
       },
       yaxis: {
         stroke: {
           width: 0
         },
         show: false
       },
       tooltip: {
         enabled: false
       }
     };
   if (typeof pagesCrawledEl !== undefined && pagesCrawledEl !== null) {
     const pagesCrawled = new ApexCharts(pagesCrawledEl, pagesCrawledConfig);
     pagesCrawled.render();
   }

 
     // Sales last year Area Chart
   // --------------------------------------------------------------------
   const pagesIndexedEl = document.querySelector('#pagesIndexed'),
     pagesIndexedConfig = {
       chart: {
         height: 78,
         type: 'area',
         parentHeightOffset: 0,
         toolbar: {
           show: false
         },
         sparkline: {
           enabled: true
         }
       },
       markers: {
         colors: 'transparent',
         strokeColors: 'transparent'
       },
       grid: {
         show: false
       },
       colors: [config.colors.success],
       fill: {
         type: 'gradient',
         gradient: {
           shade: shadeColor,
           shadeIntensity: 0.8,
           opacityFrom: 0.6,
           opacityTo: 0.25
         }
       },
       dataLabels: {
         enabled: false
       },
       stroke: {
         width: 2,
         curve: 'smooth'
       },
       series: [
         {
           data: [200, 55, 400, 250]
         }
       ],
       xaxis: {
         show: true,
         lines: {
           show: false
         },
         labels: {
           show: false
         },
         stroke: {
           width: 0
         },
         axisBorder: {
           show: false
         }
       },
       yaxis: {
         stroke: {
           width: 0
         },
         show: false
       },
       tooltip: {
         enabled: false
       }
     };
   if (typeof pagesIndexedEl !== undefined && pagesIndexedEl !== null) {
     const pagesIndexed = new ApexCharts(pagesIndexedEl, pagesIndexedConfig);
     pagesIndexed.render();
   }
 
   // Revenue Growth Chart
   // --------------------------------------------------------------------
   const revenueGrowthEl = document.querySelector('#revenueGrowth'),
     revenueGrowthConfig = {
       chart: {
         height: 160,
         type: 'bar',
         parentHeightOffset: 0,
         toolbar: {
           show: false
         }
       },
       plotOptions: {
         bar: {
           barHeight: '80%',
           columnWidth: '30%',
           startingShape: 'rounded',
           endingShape: 'rounded',
           borderRadius: 6,
           distributed: true
         }
       },
       tooltip: {
         enabled: false
       },
       grid: {
         show: false,
         padding: {
           top: -20,
           bottom: -12,
           left: -10,
           right: 0
         }
       },
       colors: [
         config.colors_label.primary,
         config.colors_label.primary,
         config.colors_label.primary,
         config.colors_label.primary,
         config.colors.primary,
         config.colors_label.primary,
         config.colors_label.primary
       ],
       dataLabels: {
         enabled: false
       },
       series: [
         {
           data: [25, 40, 55, 70, 85, 70, 55]
         }
       ],
       legend: {
         show: false
       },
       xaxis: {
         categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
         axisBorder: {
           show: false
         },
         axisTicks: {
           show: false
         },
         labels: {
           style: {
             colors: labelColor,
             fontSize: '13px',
             fontFamily: 'Public Sans'
           }
         }
       },
       yaxis: {
         labels: {
           show: false
         }
       },
       states: {
         hover: {
           filter: {
             type: 'none'
           }
         }
       },
       responsive: [
         {
           breakpoint: 1471,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '50%'
               }
             }
           }
         },
         {
           breakpoint: 1350,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '57%'
               }
             }
           }
         },
         {
           breakpoint: 1032,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '60%'
               }
             }
           }
         },
         {
           breakpoint: 992,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '40%',
                 borderRadius: 8
               }
             }
           }
         },
         {
           breakpoint: 855,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '50%',
                 borderRadius: 6
               }
             }
           }
         },
         {
           breakpoint: 440,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '40%'
               }
             }
           }
         },
         {
           breakpoint: 381,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '45%'
               }
             }
           }
         }
       ]
     };
   if (typeof revenueGrowthEl !== undefined && revenueGrowthEl !== null) {
     const revenueGrowth = new ApexCharts(revenueGrowthEl, revenueGrowthConfig);
     revenueGrowth.render();
   }


      // Query Growth Chart
   // --------------------------------------------------------------------
   const queryGrowthEl = document.querySelector('#queryGrowth'),
   queryGrowthConfig = {
       chart: {
         height: 160,
         type: 'bar',
         parentHeightOffset: 0,
         toolbar: {
           show: false
         }
       },
       plotOptions: {
         bar: {
           barHeight: '80%',
           columnWidth: '30%',
           startingShape: 'rounded',
           endingShape: 'rounded',
           borderRadius: 6,
           distributed: true
         }
       },
       tooltip: {
         enabled: false
       },
       grid: {
         show: false,
         padding: {
           top: -20,
           bottom: -12,
           left: -10,
           right: 0
         }
       },
       colors: [
         config.colors_label.danger,
         config.colors_label.danger,
         config.colors_label.danger,
         config.colors_label.danger,
         config.colors.danger,
         config.colors_label.danger,
         config.colors_label.danger
       ],
       dataLabels: {
         enabled: false
       },
       series: [
         {
           data: [25, 40, 55, 70, 85, 70, 55]
         }
       ],
       legend: {
         show: false
       },
       xaxis: {
         categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
         axisBorder: {
           show: false
         },
         axisTicks: {
           show: false
         },
         labels: {
           style: {
             colors: labelColor,
             fontSize: '13px',
             fontFamily: 'Public Sans'
           }
         }
       },
       yaxis: {
         labels: {
           show: false
         }
       },
       states: {
         hover: {
           filter: {
             type: 'none'
           }
         }
       },
       responsive: [
         {
           breakpoint: 1471,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '50%'
               }
             }
           }
         },
         {
           breakpoint: 1350,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '57%'
               }
             }
           }
         },
         {
           breakpoint: 1032,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '60%'
               }
             }
           }
         },
         {
           breakpoint: 992,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '40%',
                 borderRadius: 8
               }
             }
           }
         },
         {
           breakpoint: 855,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '50%',
                 borderRadius: 6
               }
             }
           }
         },
         {
           breakpoint: 440,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '40%'
               }
             }
           }
         },
         {
           breakpoint: 381,
           options: {
             plotOptions: {
               bar: {
                 columnWidth: '45%'
               }
             }
           }
         }
       ]
     };
   if (typeof queryGrowthEl !== undefined && queryGrowthEl !== null) {
     const queryGrowth = new ApexCharts(queryGrowthEl, queryGrowthConfig);
     queryGrowth.render();
   }

   
 
   
 
 })();
 