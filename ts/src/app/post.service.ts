import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable, Subject } from 'rxjs';
import { postInterface } from './postInterface';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  
  private posts:Subject<any>

  constructor() {
    this.posts = new Subject<any>(
      // subject:'Assunto:',
      // author:'Nome:',
      // topic:'Tópico:',

    );
   }

  updatePosts(posts:any){
    this.posts.next(posts)
  }
  public get currentPostSubject():Subject<postInterface>{
    return this.posts
  }
}
