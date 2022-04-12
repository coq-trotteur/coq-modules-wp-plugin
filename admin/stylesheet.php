<script src="https://unpkg.com/phosphor-icons"></script>

<style>
    .coq-admin {
        margin: 20px 20px 0 2px;
    }

    .coq-admin button {
        cursor: pointer;
    }

    .coq-admin .destination {
        display: none;
        align-items: center;
    }

    .coq-admin .destination-name {
        margin-left: 3px;
    }

    .coq-admin .destination-error {
        background-color: #e74c3c;
        color: white;
        padding: 10px;
        border-radius: 4px;
        display: inline-block;
        display: none;
    }

    .coq-admin .destination i {
        margin-right: 6px;
        color: #5ba640;
    }

    .coq-admin #destinationId.error {
        border-color: red;
    }

    .coq-admin #destinationId.valid {
        border-color: #5ba640;
    }

    .coq-admin h1 {
        font-weight: 400;
        font-size: 23px;
    }

    .coq-admin .refresh-button {
        border: 1px solid #dddddd;
        border-radius: 4px;
        height: 37px;
        width: 37px;
        vertical-align: top;
    }

    .coq-admin input {
        border: 1px solid #dddddd;
        border-radius: 4px;
        padding: 8px 12px;
        width: 300px;
        vertical-align: top;
    }

    .coq-admin .module {
        margin: 20px 0;
    }

    .coq-admin .label {
        font-weight: 500;
        margin: 0 0 4px 0;
        display: flex;
        align-items: center;
        font-size: 16px;
    }

    .coq-admin .label>i {
        margin-right: 6px;
        font-size: 18px;
    }

    .coq-admin .buttons {
        margin: 40px 0 0 0;
    }

    .coq-admin .buttons button {
        padding: 8px 12px;
        border: 1px solid #408328;
        border-radius: 4px;
        background-color: #5ba640;
        font-weight: 500;
        color: white;
        width: 300px;
        transition: background-color 250ms;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .coq-admin .buttons button>i {
        margin-right: 4px;
    }

    .coq-admin .buttons button:hover {
        background-color: #408328;
    }

    .coq-admin .saved-notification {
        padding: 10px;
        border-radius: 4px;
        background-color: #5ba640;
        color: white;
        text-align: center;
        font-weight: 500;
    }

    .coq-admin [type=submit]:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .coq-admin .see-button {
        height: 37px;
        border: 1px solid #dddddd;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        padding: 0 10px;
    }


    .coq-admin .see-button:hover span {
        text-decoration: underline;
    }

    .coq-admin .see-button i {
        margin-right: 4px;
    }
</style>