<?php

// Code of admin page (coq-trotteur tab)

include('stylesheet.php');

?>
<form action="" method="POST">
    <div class="coq-admin">
        <h1>Modules coq-trotteur</h1>
        <hr />
        <?php $post = getCoqPost(); ?>
        <script>
            const coqAdminData = <?php echo $post['json-content']; ?>

            const refresh = () => {
                const destinationIdInput = document.querySelector('[name=destinationId]')

                if (!destinationIdInput) {
                    console.error('Impossible de trouver le input destinationId')
                    return
                }

                const id = destinationIdInput.value

                const query = `
                    query ($id: ID!){
                        fetchDestination(id: $id){
                            id
                            name
                            sections{
                                name
                                label_as
                            }
                        }
                    }
                `

                const variables = {
                    id
                }

                fetch('https://api-v2.coq-trotteur.com/graphql', {
                    method: "POST",
                    body: JSON.stringify({
                        query,
                        variables
                    })
                }).then(result => result.json()).then(result => {

                    if (!result.data) {
                        document.querySelector('.coq-admin #destinationId').classList.remove('valid')
                        document.querySelector('.coq-admin #destinationId').classList.add('error')
                        document.querySelector('.coq-admin .destination').style.display = "none"
                        document.querySelector('.coq-admin .destination-error').style.display = "inline-block"
                        document.querySelector('.coq-admin [type=submit]').disabled = true

                    } else {

                        const destination = result.data.fetchDestination

                        document.querySelector('.coq-admin #destinationId').classList.add('valid')
                        document.querySelector('.coq-admin #destinationId').classList.remove('error')
                        document.querySelector('.coq-admin .destination').style.display = "flex"
                        document.querySelector('.coq-admin .destination-error').style.display = "none"
                        document.querySelector('.coq-admin .destination-name').innerHTML = destination.name
                        document.querySelector('.coq-admin [type=submit]').disabled = false
                    }
                })

            }

            const openPage = url => {
                window.open(url, '_blank')
            }
        </script>

        <div class="module">
            <div class="label">
                <i class="ph-key"></i> Clé d'API
            </div>
            <input value="<?php echo $post['content']->apiKey ?>" name="apiKey" />
        </div>

        <div class="module">
            <div class="label">
                <i class="ph-mountains"></i>
                Identifiant de destination
            </div>
            <input value="<?php echo $post['content']->destinationId ?>" name="destinationId" id="destinationId" oninput="refresh()" />
        </div>

        <div class="module destination">
            <div><i class="ph-check"></i></div>
            Destination : <div class="destination-name"></div>
        </div>

        <div class="destination-error">
            Impossible de trouver la destination, veuillez vérifier l'identifiant.
        </div>

        <hr />

        <div class="module">
            <div class="label">
                <i class="ph-squares-four"></i>
                Page section
            </div>
            <input value="<?php echo $post['content']->section->slug ?>" name="sectionSlug" />

            <button type="button" class="see-button" onclick="openPage('<?php echo get_site_url() . '/' . $post['content']->section->slug ?>', '_blank')">
                <i class="ph-eye"></i> <span>Voir la page</span>
            </button>
        </div>
        <div id="sections"></div>
        <div class="module">
            <div class="label">
                <i class="ph-bicycle"></i>
                Page activité
            </div>
            <input value="<?php echo $post['content']->activity->slug ?>" name="activitySlug" />

            <button type="button" class="see-button" onclick="openPage('<?php echo get_site_url() . '/' . $post['content']->activity->slug ?>?slug=le-vertige-souterrain', '_blank')">
                <i class="ph-eye"></i> <span>Voir la page</span>
            </button>
        </div>
        <div class="module" style="display:none">
            <div class="label">
                <i class="ph-shopping-bag"></i>
                Page produit
            </div>
            <input value="<?php echo $post['content']->marketItem->slug ?>" name="marketItemSlug" />

            <button type="button" class="see-button" onclick="openPage('<?php echo get_site_url() . '/' . $post['content']->marketItem->slug ?>?id=xxxx', '_blank')">
                <i class="ph-eye"></i> <span>Voir la page</span>
            </button>
        </div>
        <div class="module">
            <div class="label">
                <i class="ph-image"></i>
                Page inpiration
            </div>
            <input value="<?php echo $post['content']->inspiration->slug ?>" name="inspirationSlug" />
            <button type="button" class="see-button" onclick="openPage('<?php echo get_site_url() . '/' . $post['content']->inspiration->slug ?>', '_blank')">
                <i class="ph-eye"></i> <span>Voir la page</span>
            </button>
        </div>

        <div class="buttons">
            <button type="submit"><i class="ph-floppy-disk"></i> Enregistrer</button>
        </div>
    </div>
</form>

<script>
    refresh()
</script>