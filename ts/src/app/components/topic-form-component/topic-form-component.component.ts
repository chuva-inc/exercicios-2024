import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { PostService } from 'src/app/post.service';

@Component({
  selector: 'app-topic-form-component',
  templateUrl: './topic-form-component.component.html',
  styleUrls: ['./topic-form-component.component.scss']
})
export class TopicFormComponentComponent implements OnInit {
  validationForm:boolean = true;
  showValidationForm = new EventEmitter<boolean>();
  styleContent: string = '';

   async displayValidationForm(){
   this.validationForm = !this.validationForm ;
   this.showValidationForm.emit(this.validationForm);
   

   if (this.validationForm) {
    this.styleContent = 'display: block;';
  } else {
    this.styleContent = 'display: none;';
  }
  }

    form:FormGroup
  constructor(private formBuilder:FormBuilder, private postService:PostService) {
    this.form = this.formBuilder.group({
      subject:[''],
      author:['Carlos Henrique Santos'],
      topic:[''],
    })
   }


  ngOnInit(): void {
  }
  onSubmit(): void {
    this.postService.updatePosts([this.form.value] )
  }

  
}
