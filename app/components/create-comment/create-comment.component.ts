import { Component, OnInit } from '@angular/core';
import { SharedService } from './../../shared.service-create-comment';

@Component({
  selector: 'app-create-comment',
  templateUrl: './create-comment.component.html',
  styleUrls: ['./create-comment.component.scss']
})
export class CreateCommentComponent implements OnInit {

  constructor( private sharedService: SharedService ) { }

  ngOnInit(): void {
  }
  Cdisplay = 'block' //'visible'
  Sdisplay = 'none' //'collapse'
  Thanksdisplay = 'none'
  first_topic = true
  // cuz it doesn't actually create when clicking to create more than one, nothing new will happen
  createTopic() {
    if(this.first_topic){
      this.Cdisplay = 'none';
      this.Sdisplay = 'block';
      this.first_topic = false;
    }else{
      this.Cdisplay = 'none';
      this.Sdisplay = 'block';
      this.Thanksdisplay = 'none'
    }
  }
  sendTopic(event: Event){
    event.preventDefault();
    this.Thanksdisplay = 'block'
    this.Sdisplay = 'none';
    this.sharedService.setCensorshipDisplay('block');
  }
  
}
