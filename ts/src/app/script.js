function readMore() { 
    var points= document.getElementById("points");
    var moreText= document.getElementById("moreText");
    var buttonVerMais= document.getElementById("verMais");
    
    if(points.style.display === "none") {
        points.style.display = "inline";
        moreText.style.display = "none";
        buttonVerMais.innerHTML = "ver mais";
    } else {
        points.style.display = "none";
        moreText.style.display = "inline";
        buttonVerMais.innerHTML = " ver menos";
    }
}

function createATopic() {
    var createTopic = document.getElementById("create_topic");
    var form = document.getElementById("form");

    if(createTopic.style.display === "none") {
        createTopic.style.display = "inline";
        form.style.display = "none";
    } else {
        createTopic.style.display = "none";
        form.style.display = "inline";
    }
}

function submitForm() {
    var form = document.getElementById("form");
    var sent = document.getElementById("sent");

    if(form.style.display === "none") {
        form.style.display = "inline";
        sent.style.display = "none";
    } else {
        form.style.display = "none";
        sent.style.display = "inline";
    }
}

function coments() {
    var interactions = document.getElementById("interactions");

    interactions.style.display = "inline";
}

function createNewTopic() {
    var sent = document.getElementById("sent");
    var form = document.getElementById("form");

    if(sent.style.display === "none") { 
        sent.style.display = "inline";
        form.style.display ="none";
    } else {
        sent.style.display = "none";
        form.style.display = "inline";
    }
}