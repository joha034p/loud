<?php

//The template for displaying front page


get_header();
?>


<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <div class="podContainer">
                <img class="pic" src="" alt="">
                <div>
                    <h2></h2>
                    <p class="langbeskrivelse"></p>
                    <p class="antal_episoder"></p>
                </div>
            </div>
        </article>

        <section id="episoder">
            <template>
                <article>
                    <div class="episoder_article_container">
                        <img class="episodePic" src="" alt="">
                        <div class="episoder_txt_container">
                            <h2 class="episodeOverskrift"></h2>
                            <p class="beskrivelse"></p>
                            <p class="varighed"></p>
                            <p class="udgivelsesdato"></p>
                            <a href="">Læs mere</a>
                        </div>
                    </div>
                </article>
            </template>
        </section>
    </main>

    <script>
        let podcast;
        let episoder;
        let aktuelpodcast = <?php echo get_the_ID() ?>;
        const url = "http://johanrives.dk/loud/wp-json/wp/v2/podcast/" + aktuelpodcast;
        const episodeUrl = "http://johanrives.dk/loud/wp-json/wp/v2/episode?per_page=100";

        const container = document.querySelector("#episoder");

        async function getJson() {
            const data = await fetch(url);
            podcast = await data.json();

            const data2 = await fetch(episodeUrl);
            episoder = await data2.json();
            console.log("episoder: ", episoder);

            visPodcasts();
            visEpisoder();
        }

        function visPodcasts() {
            let antalEpisoder = 0;
            document.querySelector("h2").textContent = podcast.title.rendered;
            document.querySelector(".pic").src = podcast.billede.guid;
            document.querySelector(".langbeskrivelse").textContent = podcast.langbeskrivelse;

            episoder.forEach(episode => {
                console.log("loop id :", aktuelpodcast);
                if (episode.episode_til_podcasten == aktuelpodcast) {
                    antalEpisoder++
                }
            })
            document.querySelector(".antal_episoder").textContent = "Episoder: " + antalEpisoder;
        }


        function visEpisoder() {
            let temp = document.querySelector("template");

            episoder.forEach(episode => {
                console.log("loop id :", aktuelpodcast);
                if (episode.episode_til_podcasten == aktuelpodcast) {

                    let klon = temp.cloneNode(true).content;
                    klon.querySelector(".episodePic").src = episode.billede.guid;
                    klon.querySelector(".episodeOverskrift").textContent = episode.title.rendered;
                    klon.querySelector(".varighed").innerHTML = episode.varighed;
                    klon.querySelector(".udgivelsesdato").innerHTML = episode.udgivelsesdato;
                    klon.querySelector("article").addEventListener("click", () => {
                        location.href = episode.link;
                    })

                    klon.querySelector("a").href = episode.link;
                    console.log("episode", episode.link);
                    container.appendChild(klon);
                }
            })
        }

        getJson();

    </script>
</section>
<!--#primary-->

<?php
get_footer();
