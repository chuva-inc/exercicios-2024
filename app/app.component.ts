import { Component } from '@angular/core';
import { SharedService } from './shared.service-create-comment'

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.base.html', //'./app.component.html',
  styleUrls: ['./app.component.base.scss']
})
export class AppComponent {
  constructor( public sharedService: SharedService ) { }

  ngOnInit():void{
        // Inscreva-se nas mudanças da propriedade censorshipDisplay$ do serviço compartilhado
        this.sharedService.censorshipDisplay$.subscribe(value => {
          this.commentList[0].censorship_display = value;
          this.commentList[0].comment_display = value;
          this.commentList[0].bg_color = '#E7E7E7';
        });
  }

  commentList = [
    {
      censorship_display: 'none',
      comment_display: 'none',
      bg_color: '',
      blur: 'blur(4px)',
      pointer_events: 'none',
    },
    {
      censorship_display: 'none',
      comment_display: 'flex',
      bg_color: '',
      blur: '',
      pointer_events: '',
    },
    {
      censorship_display: 'none',
      comment_display: 'flex',
      bg_color: '',
      blur: '',
      pointer_events: '',
    },
  ]
}
