<?php

//The template for displaying podcasts


get_header();
?>


<section id="primary" class="content-area">
    <main id="main" class="site-main inner-wrap">
        <nav id="filtrering"><button data-podcast="alle">Alle</button></nav>
        <section class="podcastcontainer"></section>

        <template>
            <div class="article_container">
                <img class="podcast_image" src="" alt="">
                <div class="txt_container">
                    <h2></h2>
                    <p class="kortbeskrivelse"></p>
                    <p class="antal_episoder">Episoder: </p>
                </div>
            </div>
        </template>
    </main>

    <script>
        let podcasts;
        let categories;
        let episoder;
        let filterPodcast = "alle";
        const url = "http://johanrives.dk/loud/wp-json/wp/v2/podcast?per_page=100";
        const catUrl = "http://johanrives.dk/loud/wp-json/wp/v2/categories";
        const episodeUrl = "http://johanrives.dk/loud/wp-json/wp/v2/episode?per_page=100";

        async function getJson() {
            const data = await fetch(url);
            const catData = await fetch(catUrl);
            podcasts = await data.json();
            categories = await catData.json();
            console.log(categories);

            const data2 = await fetch(episodeUrl);
            episoder = await data2.json();
            console.log("episoder: ", episoder);

            visPodcasts();
            opretKnapper();
        }

        function opretKnapper() {
            categories.forEach(cat => {
                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-podcast="${cat.id}">${cat.name}</button>`
            })

            addEventListenersToButtons();
        }

        function addEventListenersToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);
            })
        }

        function filtrering() {
            filterPodcast = this.dataset.podcast;
            console.log(filterPodcast);
            visPodcasts();
        }

        function visPodcasts() {
            let antalEpisoder = 0;
            console.log(podcasts);
            let temp = document.querySelector("template");
            let container = document.querySelector(".podcastcontainer");
            container.innerHTML = "";
            podcasts.forEach(podcast => {
                if (filterPodcast == "alle" || podcast.categories.includes(parseInt(filterPodcast))) {
                    let klon = temp.cloneNode(true).content;
                    if (podcast.episoder.length > 0) {
                        klon.querySelector(".antal_episoder").textContent += podcast.episoder.length;
                    } else {
                        klon.querySelector(".antal_episoder").textContent += 0;
                    }
                    klon.querySelector("h2").textContent = podcast.title.rendered;
                    klon.querySelector("img").src = podcast.billede.guid;
                    klon.querySelector(".kortbeskrivelse").textContent = podcast.kortbeskrivelse;
                    klon.querySelector(".article_container").addEventListener("click", () => {
                        location.href = podcast.link;
                    })
                    container.appendChild(klon);
                }
            })
        }

        getJson();

    </script>
</section>



<?php
get_footer();
