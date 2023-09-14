import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from  '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { VenteComponent } from './vente/vente.component';
import { FormVenteComponent } from './vente/form-vente/form-vente.component';
import { ListeVenteComponent } from './vente/liste-vente/liste-vente.component';
import { NavbarComponent } from './navbar/navbar.component';
import { AutoloaderComponent } from './autoloader/autoloader.component';

@NgModule({
  declarations: [
    AppComponent,
    VenteComponent,
    FormVenteComponent,
    ListeVenteComponent,
    NavbarComponent,
    AutoloaderComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
