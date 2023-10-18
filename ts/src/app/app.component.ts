import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'DevChuva';
}

document.addEventListener('DOMContentLoaded', function () {
const btnShowMore = document.querySelectorAll('.btn-show-more') as NodeListOf<HTMLButtonElement>;
const hiddenText = document.querySelectorAll('.aditional-content') as NodeListOf<HTMLElement>;
const btnSend = document.querySelectorAll('.btn-send') as NodeListOf<HTMLButtonElement>;
const btnCreateTopic = document.querySelectorAll('.btn-create-topic') as NodeListOf<HTMLButtonElement>;

const sendTopicHeader = document.querySelectorAll('.send-topic-header') as NodeListOf<HTMLElement>;
const sendTopicDescription = document.querySelectorAll('.send-topic-description') as NodeListOf<HTMLElement>;
const sendTopicLookahead = document.querySelectorAll('.send-topic-lookahead') as NodeListOf<HTMLElement>;

const descriptionTopicHeader = document.querySelectorAll('#description-topic-header') as NodeListOf<HTMLElement>;
const descriptionTopicContainer = document.querySelectorAll('#description-topic-container') as NodeListOf<HTMLElement>;

const sendCard = document.querySelectorAll('#card-components-id') as NodeListOf<HTMLElement>;
const answeredTopic = document.querySelectorAll('.answered-topic') as NodeListOf<HTMLButtonElement>;
const answerContainers = document.querySelectorAll('.subtopic-comments-container') as NodeListOf<HTMLElement>;

function openComponent(index: number) {
  descriptionTopicContainer[index].style.display = 'none';
  sendTopicDescription[index].style.display = 'block';
  sendTopicLookahead[index].style.display = 'block';
  sendCard[index].style.display = 'flex';
}

function handleButtonClick(index: number) {
  descriptionTopicContainer[index].style.display = 'none';
  sendTopicDescription[index].style.display = 'block';
  sendTopicLookahead[index].style.display = 'block';
  sendCard[index].style.display = 'flex';
}

btnShowMore.forEach(function (btn, index) {
    btn.addEventListener('click', function () {
      if (hiddenText[index].style.display === 'none' || hiddenText[index].style.display === '') {
        hiddenText[index].style.display = 'block';
        btnShowMore[index].style.display = 'none';
      } else {
        hiddenText[index].style.display = 'none';
      }
    });
});

btnCreateTopic.forEach(function (btn, index) {
    btn.addEventListener('click', function () {
      const discussionHeader = document.querySelectorAll('#discussion-description') as NodeListOf<HTMLElement>;
      const imagesContainer = document.querySelectorAll('.discussion-description-image-container') as NodeListOf<HTMLElement>;
      const textCall = document.querySelectorAll('#discussion-call') as NodeListOf<HTMLElement>;

      discussionHeader[index].style.display = 'none';
      imagesContainer[index].style.display = 'none';
      textCall[index].style.display = 'none';

      sendTopicHeader[index].style.display = 'none';
      sendTopicDescription[index].style.display = 'none';
      sendTopicLookahead[index].style.display = 'none';

      descriptionTopicHeader[index].style.display = 'block';
      descriptionTopicContainer[index].style.display = 'flex';

      if (sendCard[index].style.display === 'flex' || hiddenText[index].style.display === '') {
        sendCard[index].style.display = 'none';
      }
    });
});

btnSend.forEach(function (btn, index) {
    btn.addEventListener('click', function () {
      descriptionTopicContainer[index].style.display = 'none';
      sendTopicDescription[index].style.display = 'block';
      sendTopicLookahead[index].style.display = 'block';
      sendCard[index].style.display = 'flex';
  });
});

answeredTopic.forEach(function (btn, index) {
    btn.addEventListener('click', function () {
      answerContainers.forEach(function (container, containerIndex) {
      container.style.display = 'flex';
      });
  });
});

})