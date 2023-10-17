const btnShowMore = document.querySelectorAll('.btn-show-more');
const hiddenText = document.querySelectorAll('.aditional-content');
const btnSend = document.querySelectorAll('.btn-send')
const btnCreateTopic = document.querySelectorAll('.btn-create-topic');

//Propriedades de texto de envio
const sendTopicHeader = document.querySelectorAll('.send-topic-header');
const sendTopicDescription = document.querySelectorAll('.send-topic-description');
const sendTopicLookahead = document.querySelectorAll('.send-topic-lookahead');

//Forms de Envio
const descriptionTopicHeader = document.querySelectorAll('#description-topic-header');
const descriptionTopicContainer = document.querySelectorAll('#description-topic-container');

const sendCard = document.querySelectorAll('#card-components-id')

btnShowMore.forEach(function (btn, index) {
  btn.addEventListener('click', function () {
    if (hiddenText[index].style.display === 'none' || hiddenText[index].style.display === '') {
      hiddenText[index].style.display = 'block';
      btnShowMore[index].style.display = 'none'
    } else {
      hiddenText[index].style.display = 'none';
      btn.textContent = 'Ver Mais'; 
    }
  });
});

btnCreateTopic.forEach(function (btn, index) {
    btn.addEventListener('click', function () {
        const discussionHeader = document.querySelectorAll('#discussion-description');
        const imagesContainer = document.querySelectorAll('.discussion-description-image-container');
        const textCall = document.querySelectorAll('#discussion-call');

        discussionHeader[index].style.display = 'none';
        imagesContainer[index].style.display = 'none';
        textCall[index].style.display = 'none';

        sendTopicHeader[index].style.display = 'none';
        sendTopicDescription[index].style.display = 'none';
        sendTopicLookahead[index].style.display = 'none';
        
        descriptionTopicHeader[index].style.display = 'block';
        descriptionTopicContainer[index].style.display = 'flex';

        if(sendCard[index].style.display === 'flex' || hiddenText[index].style.display === ''){
          sendCard[index].style.display = 'none';
        };
    });
});

btnSend.forEach(function (btn, index) {
  btn.addEventListener('click', function() {
    descriptionTopicContainer[index].style.display = 'none';

    sendTopicDescription[index].style.display = 'block';
    sendTopicLookahead[index].style.display = 'block';

    sendCard[index].style.display = 'flex'
  });
});