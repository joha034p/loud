<?php

//The template for displaying front page


get_header();
?>

<template>
    <article>
        <img src="" alt="">
        <div>
            <h2></h2>
            <p class="tekst"></p>
            <p class="kategori"></p>
            <p class="pris"></p>
        </div>
    </article>
</template>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="retcontainer"></section>
    </main>

    <script>
        let retter;
        const url = "http://johanrives.dk/passionssite/wp-json/wp/v2/ret?per_page=100";

        async function getJson() {
            const data = await fetch(url);
            retter = await data.json();
            visRetter();
        }

        function visRetter() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".retcontainer");
            retter.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = ret.title.rendered;
                klon.querySelector("img").src = ret.billede.guid;
                klon.querySelector(".tekst").textContent = ret.beskrivelse;
                klon.querySelector(".pris").textContent = ret.pris;
                klon.querySelector("article").addEventListener("click", () => {
                    location.href = ret.link;
                })
                container.appendChild(klon);
            })
        }

        getJson();

    </script>
</section>



<?php
get_footer();
