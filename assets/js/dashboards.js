const ctx = document.getElementById('graficaCitas');

new Chart(ctx,{

    type:'line',

    data:{

        labels:[
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun'
        ],

        datasets:[{

            label:'Citas',

            data:[12,18,10,25,30,24],

            borderColor:'#2563EB',

            backgroundColor:'rgba(37,99,235,.15)',

            fill:true,

            tension:.4,

            borderWidth:3,

            pointRadius:5,

            pointBackgroundColor:'#2563EB'

        }]

    },

    options:{

        responsive:true,

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{
            y:{
                beginAtZero:true
            }
        }

    }

});s