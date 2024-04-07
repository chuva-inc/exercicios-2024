
import { Component, EventEmitter, OnInit } from '@angular/core';

@Component({
  selector: 'app-showmore-component',
  templateUrl: './showmore-component.component.html',
  styleUrls: ['./showmore-component.component.scss']
})
export class ShowmoreComponentComponent implements OnInit {
  showMoreContent: boolean = true;
  showMoreChange = new EventEmitter<boolean>();




  constructor() { }

  ngOnInit(): void {
  }

  showMore() {
    this.showMoreContent = !this.showMoreContent;
    this.showMoreChange.emit(this.showMoreContent);
    

   if (this.showMoreContent) {
      
    this.showMoreChange.emit(false);
     
      
   }
  }
}
