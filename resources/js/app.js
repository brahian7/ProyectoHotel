import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import Chart from 'chart.js/auto';
import AOS from 'aos';

import 'aos/dist/aos.css';

// Importamos el Dashboard
import './dashboard/dashboard';

window.Alpine = Alpine;
window.Swal = Swal;
window.Chart = Chart;

Alpine.start();

AOS.init({

    duration: 700,

    once: true

});