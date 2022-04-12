<?php updateCoqPost($_POST); ?>

<style>
    .coq-successful-save {
        background-color: #5ba640;
        color: white;
        padding: 10px;
        border-radius: 4px;
        text-align: center;
        width: 200px;
        margin: 40px 0 0 0;
    }

    .coq-back-button {
        margin-top: 20px;
        width: 200px;
        text-align: center;
        cursor: pointer;
    }

    .coq-back-button:hover {
        text-decoration: underline;
    }
</style>

<div class="coq-successful-save">
    Sauvegarde réussie
</div>

<script>
    const timeout = window.setTimeout(() => {
        document.location.reload()
    }, 1000)
</script>

<div class="coq-back-button" role="button" onclick="clearTimeout(timeout); document.location.reload()">
    Retour
</div>