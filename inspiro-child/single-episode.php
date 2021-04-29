<?php

//The template for displaying single episode


get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <div class="epiContainer">
                <img class="pic" src="" alt="">
                <div>
                    <h2></h2>
                    <p class="beskrivelse"></p>
                    <p class="varighed"></p>
                    <p class="udgivelsesdato"></p>
                </div>
            </div>
        </article>
    </main>

    <script>
        let episode;
        let aktuelepisode = <?php echo get_the_ID() ?>;
        const url = "http://johanrives.dk/loud/wp-json/wp/v2/episode/" + aktuelepisode;

        async function getJson() {
            const data = await fetch(url);
            episode = await data.json();
            visEpisode();
        }

        function visEpisode() {
            console.log("episode id :", aktuelepisode);
            document.querySelector(".pic").src = episode.billede.guid;
            document.querySelector("h2").textContent = episode.title.rendered
            document.querySelector(".beskrivelse").innerHTML = episode.beskrivelse;
            document.querySelector(".varighed").innerHTML = episode.varighed;
            document.querySelector(".udgivelsesdato").innerHTML = episode.udgivelsesdato;
            console.log("episode", episode.link);
        }

        getJson();

    </script>
</section>
<!--#primary-->

<?php
get_footer();
