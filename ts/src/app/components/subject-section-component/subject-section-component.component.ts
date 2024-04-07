import { Component, EventEmitter, OnInit } from '@angular/core';
import { Observable, Subscription } from 'rxjs';
import { PostService } from 'src/app/post.service';
import { postInterface } from 'src/app/postInterface';

@Component({
  selector: 'app-subject-section-component',
  templateUrl: './subject-section-component.component.html',
  styleUrls: ['./subject-section-component.component.scss']
})
export class SubjectSectionComponentComponent implements OnInit {
  showFullyAnswers: boolean = true;
  showMoreAnswers = new EventEmitter<boolean>();
  posts:Subscription
  postValues:any


  constructor(private postService:PostService) {
    this.posts = postService.currentPostSubject.subscribe(data=>{
      this.postValues = data
      
    },error=>{})

   }

  ngOnInit(): void {
  }
  showAnswers(){
    this.showFullyAnswers = !this.showFullyAnswers;
    this.showMoreAnswers.emit(this.showFullyAnswers);
    

   if (this.showFullyAnswers) {
      
    this.showMoreAnswers.emit(false);
     
      
   }
  }
} 
