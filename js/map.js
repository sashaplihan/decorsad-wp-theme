ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
        center: [53.73851116, 27.50073999],
        zoom: 16
    }, {
        searchControlProvider: 'yandex#search'
    });

    myMap.geoObjects.add(new ymaps.Placemark([53.73851116, 27.50073999], {
        balloonContent: '<div style="text-align: center; color: #394b3d;"><p style="font-size: 18px; font-weight: 700;">ДекорСад </p>Минская обл. Минский р-н. <br/>а-г. Самохваловичи ул. Юзофовича, д 3</div>'
    }, {
        preset: 'islands#blueVegetationIcon',
        iconColor: '#394b3d'
    }));

    myMap.behaviors.disable([
        'scrollZoom'
    ]);
    myMap.controls
        .remove('geolocationControl')
        .remove('searchControl')
        .remove('trafficControl')
        .remove('typeSelector')
});

jQuery(window).load(function($) {
    jQuery('[class^="ymaps"]').find('[class$="ground-pane"]').css('filter', 'grayscale(1)');
}); // Делает карту серой