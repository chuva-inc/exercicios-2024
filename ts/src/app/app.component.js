const btnShowMore = document.querySelectorAll('.btn-show-more');
const hiddenText = document.querySelectorAll('.aditional-content');

const btnCreateTopic = document.querySelectorAll('.btn-create-topic');

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

        const descriptionTopicHeader = document.querySelectorAll('#description-topic-header');
        const descriptionTopicContainer = document.querySelectorAll('#description-topic-container');

        discussionHeader[index].style.display = 'none';
        imagesContainer[index].style.display = 'none';
        textCall[index].style.display = 'none';
        
        descriptionTopicHeader[index].style.display = 'block';
        descriptionTopicContainer[index].style.display = 'flex';
    });
});
