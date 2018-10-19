function setOverlay(){
    $('body').prepend(`
    <div id="overlay">
<svg class="ajaxloader" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-square"><g transform="translate(20 20)"><rect x="-15" y="-15" width="30" height="30" fill="#87c8ff"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.4s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(50 20)"><rect x="-15" y="-15" width="30" height="30" fill="#93dbe9"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.3s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(80 20)"><rect x="-15" y="-15" width="30" height="30" fill="#94fff7"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.2s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(20 50)"><rect x="-15" y="-15" width="30" height="30" fill="#93dbe9"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.3s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(50 50)"><rect x="-15" y="-15" width="30" height="30" fill="#94fff7"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.2s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(80 50)"><rect x="-15" y="-15" width="30" height="30" fill="#7be8c1"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.1s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(20 80)"><rect x="-15" y="-15" width="30" height="30" fill="#94fff7"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.2s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(50 80)"><rect x="-15" y="-15" width="30" height="30" fill="#7be8c1"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="-0.1s" repeatCount="indefinite"></animateTransform></rect></g><g transform="translate(80 80)"><rect x="-15" y="-15" width="30" height="30" fill="#87ffb2"><animateTransform attributeName="transform" type="scale" calcMode="spline" values="1;1;0.2;1;1" keyTimes="0;0.2;0.5;0.8;1" dur="1s" keySplines="0.5 0.5 0.5 0.5;0 0.1 0.9 1;0.1 0 1 0.9;0.5 0.5 0.5 0.5" begin="0s" repeatCount="indefinite"></animateTransform></rect></g></svg>
</div>
    `)
}

function removeOverlay(){
    $('#overlay').remove();
}

