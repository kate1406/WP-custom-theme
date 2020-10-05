var loadMoreBtn = document.getElementById("load-more-btn");
var loadMoreContainer = document.getElementById("load-more-container");


if (loadMoreBtn) {

    loadMoreBtn.addEventListener("click", function() {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', 'http://localhost/katarina/wp-json/wp/v2/posts?_embed&categories=2');
        ourRequest.onload = function() {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                createHTML(data);
            } else {
                console.log("We connected to the server, but it returned an error");
            }

        };

        ourRequest.onerror = function() {
            console.log("Connection error");
        };

        ourRequest.send();

    });

}

function createHTML(postsData) {

    var ourHTMLString = '<main class="main-area"><div class="centered"><section class="cards centered">';
    for (i = 0; i < postsData.length; i++) {
        ourHTMLString += '<article class="card centered"><a href="' + postsData[i].link + '"><figure class="thumbnail"><img width="150px" height="150px"  class="attachment-thumbnail size-thumbnail wp-post-image" src="' + postsData[i]._embedded["wp:featuredmedia"][0].source_url + '"/></figure><div class="card-content" >';
        ourHTMLString += '<time class="wp-block-latest-posts__post-date">' + postsData[i].date + '</time>';
        ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';

        if (postsData[i].excerpt.rendered.length > 250) {
            ourHTMLString += '<p>' + postsData[i].excerpt.rendered.substring(0, 250) + "... <b>[MORE]</b> " + '</p></div></a></article>';
        } else {
            ourHTMLString += '<p>' + postsData[i].excerpt.rendered + '</p></div></a></article>';
        }
    }
    ourHTMLString += '</section></div></main>';

    loadMoreContainer.innerHTML = ourHTMLString;

}


window.addEventListener("load", function() {

    var ourRequest = new XMLHttpRequest();

    ourRequest.open('GET', 'http://localhost/katarina/wp-json/wp/v2/posts?_embed&per_page=1&page=1');
    ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var data = JSON.parse(ourRequest.responseText);
            createHTML(data);
        } else {
            console.log("We connected to the server, but it returned an error");
        }

    };

    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();

});