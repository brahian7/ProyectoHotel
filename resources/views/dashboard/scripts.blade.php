@push('scripts')

<script>

document.addEventListener('DOMContentLoaded',()=>{

    document.querySelectorAll('.contador').forEach(c=>{

        let n=0;

        const t=parseInt(c.dataset.target)||0;

        const i=Math.max(1,Math.ceil(t/60));

        const x=setInterval(()=>{

            n+=i;

            if(n>=t){

                n=t;

                clearInterval(x);

            }

            c.innerText=n.toLocaleString();

        },20);

    });

    const canvas=document.getElementById('habitacionesChart');

    if(canvas){

        new Chart(canvas,{

            type:'doughnut',

            data:{

                labels:[
                    'Disponibles',
                    'Ocupadas',
                    'Reservadas',
                    'Mantenimiento'
                ],

                datasets:[{

                    data:[
                        {{ $disponibles }},
                        {{ $ocupadas }},
                        {{ $reservadas }},
                        {{ $mantenimiento }}
                    ],

                    backgroundColor:[
                        '#198754',
                        '#dc3545',
                        '#ffc107',
                        '#6c757d'
                    ]

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                plugins:{

                    legend:{

                        position:'bottom'

                    }

                }

            }

        });

    }

});

</script>

@endpush