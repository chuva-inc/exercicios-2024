import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { PostService } from 'src/app/post.service';

@Component({
  selector: 'app-topic-form-component',
  templateUrl: './topic-form-component.component.html',
  styleUrls: ['./topic-form-component.component.scss']
})
export class TopicFormComponentComponent implements OnInit {
    form:FormGroup
  constructor(private formBuilder:FormBuilder, private postService:PostService) {
    this.form = this.formBuilder.group({
      subject:[''],
      author:['Carlos Henrique Santos'],
      topic:[''],
    })
   }

  validationForm:boolean = true;
  showValidationForm = new EventEmitter<boolean>();

   async displayValidationForm(){
   this.validationForm = !this.validationForm ;
   this.showValidationForm.emit(this.validationForm)

    if(this.validationForm){
      await this.showValidationForm.emit(false)
    }
  }




  ngOnInit(): void {
  }
  onSubmit(): void {
    this.postService.updatePosts([this.form.value] )
  }
}
