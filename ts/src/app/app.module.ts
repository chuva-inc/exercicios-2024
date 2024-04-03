import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { LeftSideNavMenuComponent } from './components/left-side-nav-menu/left-side-nav-menu.component';
import { PageHeaderComponent } from './components/page-header/page-header.component';
import { PageMainContentComponent } from './components/page-main-content/page-main-content.component';
import { PageFooterComponent } from './components/page-footer/page-footer.component';

@NgModule({
  declarations: [
    AppComponent,
    LeftSideNavMenuComponent,
    PageHeaderComponent,
    PageMainContentComponent,
    PageFooterComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
