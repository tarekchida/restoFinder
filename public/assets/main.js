/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var restoFinder = {
    apiUrl: "/get-restaurants",
    init: function () {

        restoFinder.apiConnect();

    },
    searchFormActions: function () {

        $('#searchSort').change(function () {
            restoFinder.apiConnect();
        });
        $('#searchForm').submit(function (e) {
            e.preventDefault();
            restoFinder.apiConnect();
        });
        $('#searchButton').click(function () {
            restoFinder.apiConnect();
        });
    },
    render: function (restaurants, sortKey) {
        $('.restoGrid').html('');
        var favorites = "";
        $.each(restaurants, function (index, restaurant) {
            var randImg = Math.floor((Math.random() * 6) + 1);
            var html = '<div class="col-sm-6 col-md-4 restoBox">' +
                    '<div class="thumbnail">' +
                    '<div class="restoFav">' +
                    '<input type="checkbox"  class="favorite glyphicon glyphicon-star-empty" data-name="' + restaurant.name + '" >' +
                    '</div>' +
                    '<img src="assets/images/food' + randImg + '.jpg" alt="' + restaurant.name + '">' +
                    '<div class="caption">' +
                    '<h4>' + restaurant.name +
                    '<span class="label ' + restaurant.status.replace(" ", "-") + '">' + restaurant.status + '</span>' +
                    '</h4>' +
                    '<p>' + sortKey.split(/(?=[A-Z])/).join(' ').toUpperCase() + ': ' + restaurant.sortingValues[sortKey] + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            if (restaurant.favorite) {
                favorites += html;

            } else {
                $('.restoGrid').append(html);
            }
        });

        $('.restoGrid').prepend(favorites);

        restoFinder.manageFavorites();
    },
    apiConnect: function () {
        $('.favoGrid').html('');
        $('.restoGrid').html('<div class="loader"></div>');

        var favoritesList = restoFinder.getFavoritesList();
        var apiResquest = new Object();
        apiResquest.favorites = favoritesList;
        apiResquest.sortKey = $('#searchSort').val();
        apiResquest.search = $('#search').val();

        $.ajax({
            type: "POST",
            url: restoFinder.apiUrl,
            data: apiResquest,
            Accept: 'application/json',
            dataType: "json",
            success: function (data, status, jqXHR) {
                restoFinder.render(data, apiResquest.sortKey);
            },
            error: function (jqXHR, status) {
                console.log(jqXHR);
            }
        });
    },
    manageFavorites: function () {

        var favoritesList = restoFinder.getFavoritesList();

        $('.favorite').change(function () {
            if (this.checked) {
                favoritesList.push($(this).data('name'));
            } else {
                favoritesList.splice($.inArray($(this).data('name'), favoritesList), 1);
            }
            localStorage.setItem('favoritesList', JSON.stringify(favoritesList));
        });


        $('.favorite').each(function () {
            if ($.inArray($(this).data('name'), favoritesList) !== -1) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        });
    },
    getFavoritesList: function () {
        var favoritesList = localStorage.getItem('favoritesList');
        favoritesList = (favoritesList) ? JSON.parse(favoritesList) : [];
        return favoritesList;
    }
};

$(document).ready(function () {
    restoFinder.init();
    restoFinder.searchFormActions();
});