// Adiciona a funcionalidade de seleção ao menu lateral
document.querySelectorAll('.itemMenu').forEach(item => {
    item.addEventListener('click', () => {
      document.querySelectorAll('.itemMenu').forEach(i => i.classList.remove('selected'));
      item.classList.add('selected');
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    const expandButton = document.querySelector(".expand-button");
    const collapsedContent = document.querySelector(".collapsed-content");
  
    expandButton.addEventListener("click", function () {
      collapsedContent.classList.toggle("expanded");
      expandButton.classList.toggle("hidden");
  
      if (collapsedContent.classList.contains("expanded")) {
        expandButton.textContent = "Ver menos";
      } else {
        expandButton.textContent = "Ver mais";
      }
    });
  });

  document.addEventListener('DOMContentLoaded', () => {
    const createTopicButton = document.getElementById('create-topic-button');
    const discussionContent = document.getElementById('discussion-content');
    const discussionForm = document.getElementById('discussion-form');
    const discussionConfirmation = document.getElementById('discussion-confirmation');
    const topicForm = document.getElementById('topic-form');
    const newTopicButton = document.getElementById('new-topic-button');
    const responseButton = document.getElementById('response-button');
    const cardExpanded = document.getElementById('card-expanded');
  
    createTopicButton.addEventListener('click', () => {
      discussionContent.classList.add('hidden');
      discussionForm.classList.remove('hidden');
    });
  
    topicForm.addEventListener('submit', (e) => {
      e.preventDefault();
      discussionForm.classList.add('hidden');
      discussionConfirmation.classList.remove('hidden');
    });
  
    newTopicButton.addEventListener('click', () => {
      discussionConfirmation.classList.add('hidden');
      discussionForm.classList.remove('hidden');
    });
  
    responseButton.addEventListener('click', () => {
      cardExpanded.classList.toggle('hidden');
    });
  });
  


 
 
 
 
 
 
 


  
   

  
  
