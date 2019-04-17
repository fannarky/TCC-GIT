import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { CollapseModule } from 'ngx-bootstrap';
import { AccordionModule } from 'ngx-bootstrap';
import { SidebarModule } from 'ng-sidebar';

@NgModule({
  declarations: [
    AppComponent,
    SidebarComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    [CollapseModule.forRoot()],
    [AccordionModule.forRoot()],
    [SidebarModule.forRoot()]
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
