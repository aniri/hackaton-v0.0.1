$("#CRM_editClientPOST").validate({
 ignore: [],
  rules: { 
                    //account
					dateClient_tipClient:{
						required: true
					},
					dateClient_nume:{
						required: function(element) {
							return $("#dateClient_tipClient").is(':visible');
						}
					},
					dateClient_prenume:{
						required: function(element) {
							return $("#dateClient_prenume").is(':visible');
						}
					},
					dateClient_denumire:{
						
						required: function(element) {
							return $("#dateClient_denumire").is(":visible"); 
						}
					},
					dateClient_cui:{
						CUI: true
					},
					dateClient_cnp:
					{
						roCNP: true
					},
					adresa_codPostal:{
						number: true
					},
					adresa_etaj:{
						number: true
					},
					contact_telefon:{
						required: true,
						number: true,
						minlength:10, 
						maxlength:15
					},
					persoanaContact_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					contact_email:{
						required: true,
						email: true
					},
					
					contact_webSite:{
						url: true
					},
					persoanaContact_email:{						
						email: true
					},
					persoanaContact_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					adresaCorespondenta_adresa:{
						required: true
					},
					adresaCorespondenta_judetSector:{
						required: true
					},
					adresaCorespondenta_localitate:{
						required: true
					},
					adresaCorespondenta_strada:{
						required: true
					},
					adresaCorespondenta_numar:{
						required: true
					},
					adresaCorespondenta_codPostal:{
						number: true
					},
					adresaCorespondenta_etaj:{
						number: true
					},
					administrare_categorie:{
						required: true,
						minlength: 1
					},
					alteDetalii_societateLeasing:{
						required: true
					},
					alteDetalii_RO:{
						required: function(element) {
							return $("#alteDetalii_RO").is(":visible"); 
						}
					},
					alteDetalii_IBAN:{						
						iban: true
					}
					
					
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    },
					dateClient_tipClient: {
						required: "Selecteaza tipul de client."
					},
					contact_webSite:{
						url: "Campul trebuie sa contina adresa unui website."
					},
					adresa_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresa_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",
						required: "Acest camp este obligatoriu.",
						minlength: "Introduceti minim 10 caractere."
					},
					persoanaContact_telefon:{
						number: "Valoarea introdusa este necesar sa fie numerica.",						
						minlength: "Introduceti minim 10 caractere."
					},
					persoanaContact_email:{						
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					contact_email:{
						required: "Acest camp este obligatoriu.",
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					dateClient_nume: {
						required: "Acest camp este obligatoriu."
					},
					dateClient_prenume: {
						required: "Acest camp este obligatoriu."
					},
					dateClient_denumire: {
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_adresa:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_localitate:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_numar:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaCorespondenta_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					administrare_categorie:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_societateLeasing:{
						required: "Acest camp este obligatoriu."
						
					},
					alteDetalii_RO:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_IBAN:{	
						iban: "Nu ati introdus un IBAN valid."					
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editProductPOST").validate({
 ignore: [],
 rules: {
                    dateProdus_categorie:{
						required: true
					},
					dateProdus_pretStandardMediu:{
						number: true
					},
					 dateProdus_tipProdus:{
						required: true
					},
					 dateProdus_denumire:{
						required: true
					},
					 dateProdus_tipPret:{
						required: true
					},
					 dateProdus_tipComision:{
						required: true
					},
					 dateProdus_valoareComision:{
						required: true,
						number: true
					},
					dateProdus_status: {
						required: true							
					}
					
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    },
					dateProdus_pretStandardMediu:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					dateProdus_categorie: {
						required: "Acest camp este obligatoriu."
					},
					dateProdus_tipProdus: {
						required: "Acest camp este obligatoriu."
					},
					dateProdus_denumire: {
						required: "Acest camp este obligatoriu."
					},
					dateProdus_tipPret: {
						required: "Acest camp este obligatoriu."
					},
					dateProdus_tipComision: {
						required: "Acest camp este obligatoriu."
					},
					dateProdus_valoareComision: {
						required: "Acest camp este obligatoriu.",
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					dateProdus_status: {
						required: "Acest camp este obligatoriu."							
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editBrokerPOST").validate({
 ignore: [],
 rules: {
					dateBroker_denumire:{
						required: true
					},
                    dateBroker_cui:{
						CUI: true,
						required: true
					},
					adresaSediu_judetSector:{
						required: true
					},
					adresaSediu_localitate:{
						required: true
					},
					adresaSediu_strada:{
						required: true
					},
					adresaSediu_numar:{
						required: true
					},
					adresaSediu_codPostal:{
						number: true
					},
					adresaSediu_etaj:{
						number: true
					},
					contact_telefon:{
						number: true,
						minlength:10, 
						maxlength:15
						
					},
					contact_email:{
						email: true
					},
					contact_webSite:{
						url: true
					},
					persoanaDeContact_telefon:{
						number: true,
						minlength:10, 
						maxlength:15
					},
					persoanaDeContact_email:{
						email: true
					},
					adresaCorespondenta_adresa:{
						required: true
					},
					adresaCorespondenta_judetSector:{
						required: true
					},
					adresaCorespondenta_localitate:{
						required: true
					},
					adresaCorespondenta_strada:{
						required: true
					},
					adresaCorespondenta_numar:{
						required: true
					},
					adresaCorespondenta_codPostal:{
						number: true
					},
					adresaCorespondenta_etaj:{
						number: true
					},
					alteDetalii_RO:{
						required: true
					},
					alteDetalii_IBAN:{						
						iban: true
					}
					
                },

                messages: { 
					dateBroker_denumire:{
						required: "Acest camp este obligatoriu."
					},
                    dateBroker_cui:{
						required: "Acest camp este obligatoriu.",
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaSediu_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_localitate:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_numar:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaSediu_etaj:{
						number:  "Valoare introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						number:  "Valoare introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere.", 
						maxlength:"Introduceti maxim 15 caractere."
						
					},
					contact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					contact_webSite:{
						url: "Campul trebuie sa contina adresa unui website."
					},
					persoanaDeContact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere.", 
						maxlength: "Introduceti maxim 15 caractere."
					},
					persoanaDeContact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					adresaCorespondenta_adresa:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_localitate:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_numar:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaCorespondenta_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					alteDetalii_RO:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_IBAN:{	
						iban: "Nu ati introdus un IBAN valid."					
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editAsiguratorFurnizorPOST").validate({
 ignore: [],
 rules: {
					dateAsiguratorFurnizor_categorieProdus:{
						required: true
					},	
					dateAsiguratorFurnizor_denumire:{
						required: true
					},
					dateAsiguratorFurnizor_status:{
						required: true
					},
					dateAsiguratorFurnizor_cui:{
						required: true,
						CUI: true
					},
					adresaSediu_judetSector:{
						required: true
					},
					adresaSediu_localitate:{
						required: true
					},
					adresaSediu_strada:{
						required: true
					},
					adresaSediu_numar:{
						required: true
					},
					adresaSediu_codPostal:{
						number: true
					},
					adresaSediu_etaj:{
						number: true
					},
					contact_telefon:{
						number: true,
						minlength:10, 
						maxlength:15
					},
					contact_email:{
						email: true
					},
					contact_webSite:{
						url: true
					},
					persoanaContact_telefon:{
						number: true,
						minlength:10, 
						maxlength:15
					},
					persoanaContact_email:{
						email: true
					},
					adresaCorespondenta_adresa:{
						required: true
					},
					adresaCorespondenta_judetSector:{
						required: true
					},
					adresaCorespondenta_localitate:{
						required: true
					},
					adresaCorespondenta_strada:{
						required: true
					},
					adresaCorespondenta_numar:{
						required: true
					},
					adresaCorespondenta_codPostal:{
						number: true
					},
					adresaCorespondenta_etaj:{
						number: true
					},
					alteDetalii_RO:{
						required: true
					},
					alteDetalii_IBAN:{						
						iban: true
					}
					
                },

                messages: { 
					dateAsiguratorFurnizor_categorieProdus:{
						required: "Acest camp este obligatoriu."
					},	
					dateAsiguratorFurnizor_denumire:{
						required: "Acest camp este obligatoriu."
					},
					dateAsiguratorFurnizor_status:{
						required: "Acest camp este obligatoriu."
					},
					dateAsiguratorFurnizor_cui:{
						required: "Acest camp este obligatoriu.",
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaSediu_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_localitate:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_numar:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaSediu_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere.", 
						maxlength: "Introduceti maxim 15 caractere."
					},
					contact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					contact_webSite:{
						url:  "Campul trebuie sa contina adresa unui website."
					},
					persoanaContact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere.", 
						maxlength: "Introduceti maxim 15 caractere."
					},
					persoanaContact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					adresaCorespondenta_adresa:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_adresa:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_numar:{
						required: "Acest camp este obligatoriu."
					},
					adresaCorespondenta_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaCorespondenta_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					alteDetalii_RO:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_IBAN:{						
						iban: "Nu ati introdus un IBAN valid."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editSucursaleFurnizorPOST").validate({
 ignore: [],
  rules: {
					dateSucursaleFurnizor_furnizor:{
						required: true
					},
                    dateSucursaleFurnizor_denumire:{
						required: true
					},
					dateSucursaleFurnizor_status:{
						required: true
					},
					adresaSediu_judetSector:{
						required: true
					},
					adresaSediu_localitate:{
						required: true
					},
					adresaSediu_strada:{
						required: true
					},
					adresaSediu_numar:{
						required: true
					},
					adresaSediu_codPostal:{
						number: true
					},
					adresaSediu_etaj:{
						number: true
					},
					contact_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					contact_email:{
						email: true
					},
					contact_webSite:{
						url: true
					},
					persoanaContact_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					persoanaContact_email:{
						email: true
					}
                },

                messages: { 
					dateSucursaleFurnizor_furnizor:{
						required: "Acest camp este obligatoriu."
					},
                    dateSucursaleFurnizor_denumire:{
						required: "Acest camp este obligatoriu."
					},
					dateSucursaleFurnizor_status:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_judetSector:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_localitate:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_strada:{
						required: "Acest camp este obligatoriu."
					},
					adresaSediu_numar:{
						required: "Acest camp este obligatoriu."
					},
					contact_webSite:{
						url: "Campul trebuie sa contina adresa unui website."
					},
					adresaSediu_codPostal:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					adresaSediu_etaj:{
						number: "Valoare introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",						
						minlength: "Introduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					persoanaContact_telefon:{
						number: "Valoare introdusa este necesar sa fie numerica.",						
						minlength: "Introduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					persoanaContact_email:{						
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					contact_email:{						
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editCerereOfertaPOST").validate({
 ignore: [],
  rules: {
					dateCerereOferta_dataCerereOferta:{
						required: true
					},
					dateCerereOferta_termenOferta:{
						required: true
					},
					dateCerereOferta_tipCerereOferta:{
						required: true
					},
					dateCerereOferta_tipProdus:{
						required: true
					},
					dateCerereOferta_tipOferta:{
						required: true
					},
					dateCerereOferta_dataInceput:{
						required: true
					},					
					dateClient_numeDenumire:{
						required: true
					},
					dateClient_cnpCui:{
						required: true
					},
					dateClient_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					dateClient_email:{
						email: true
					},
					
					dateContractant_dateClient:{
						required: true
					},
					dateContractant_numeDenumire:{
						required: true
					},
					dateContractant_cnpCui:{
						required: true
					},
					dateContractant_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					dateContractant_email:{
						email: true
					},
					
					detaliiCerere_valabilitate:{
						number: true
					}				
                    
                },

                messages: { 
					dateCerereOferta_dataCerereOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_termenOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipCerereOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipProdus:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_dataInceput:{
						required: "Acest camp este obligatoriu."
					},					
					dateClient_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateClient_cnpCui:{
						required: "Acest camp este obligatoriu."
					},
					dateClient_telefon:{						
						number: "Valoarea inrodusa este necesar sa fie numerica.",
						minlength: "Inroduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					dateClient_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					
					dateContractant_dateClient:{
						required: "Acest camp este obligatoriu."
					},
					dateContractant_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateContractant_cnpCui:{
						required: "Acest camp este obligatoriu."
					},
					dateContractant_telefon:{						
						number: "Valoarea inrodusa este necesar sa fie numerica.",
						minlength: "Inroduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					dateContractant_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					detaliiCerere_valabilitate:{
						number: "Valoarea inrodusa este necesar sa fie numerica."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editOfertaPOST").validate({
 ignore: [],
   rules: {
					dateOferta_idCerereOferta:{
						required: true
					},
					dateOferta_dataCerereOferta:{
						required: true
					},
					dateOferta_dataTransmitereOferta:{
						required: true
					},
					dateOferta_termenOferta:{
						required: true
					},
					dateOferta_tipCerereOferta:{
						required: true
					},
					dateOferta_tipProdus:{
						required: true
					},
					dateClient_numeDenumire:{
						required: true
					},
					dateClient_cnpCui:{
						required: true
					},
					dateClient_telefon:{						
						number: true,
						minlength:10, 
						maxlength:15
					},
					dateClient_email:{
						email: true
					},
					
					dateContractant_dateClient:{
						required: true
					},
					dateContractant_numeDenumire:{
						required: true
					}
                },

                messages: { 
				dateOferta_termenOferta:{
						required: "Acest camp este obligatoriu."
					},
				dateOferta_idCerereOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_dataCerereOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_termenOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipCerereOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipProdus:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_tipOferta:{
						required: "Acest camp este obligatoriu."
					},
					dateCerereOferta_dataInceput:{
						required: "Acest camp este obligatoriu."
					},					
					dateClient_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateClient_cnpCui:{
						required: "Acest camp este obligatoriu."
					},
					dateClient_telefon:{						
						number: "Valoarea inrodusa este necesar sa fie numerica.",
						minlength: "Inroduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					dateClient_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					
					dateContractant_dateClient:{
						required: "Acest camp este obligatoriu."
					},
					dateContractant_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateContractant_cnpCui:{
						required: "Acest camp este obligatoriu."
					},
					oferta_valoareV1:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV2:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV3:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV4:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV5:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV6:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV7:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV8:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV9:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					oferta_valoareV10:{number: "Valoarea inrodusa este necesar sa fie numerica."},
					
					
					
					dateContractant_telefon:{						
						number: "Valoarea inrodusa este necesar sa fie numerica.",
						minlength: "Inroduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere."
					},
					dateContractant_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					detaliiCerere_valabilitate:{
						number: "Valoarea inrodusa este necesar sa fie numerica."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editRecomandatorPOST").validate({
 ignore: [],
   rules: {
					dateRecomandator_tip:{
						required: true
					},
					dateRecomandator_numeDenumire:{
						required: true
					},
					dateRecomandator_cnpCui:{
						number: true,
						cuiCNP: true
					},
					adresaDomiciliuSediu_codPostal:{
						number: true
					},
					adresaDomiciliuSediu_etaj:{
						number: true
					},
					adresaDomiciliuSediu_codPostal:{
						
						number: true
						
					},
					contact_telefon:{
						number: true,
						minlength:10,
						maxlength:15
					},
					contact_email:{
						required: true,
						email: true
					},
					persoanaDeContact_telefon:{
						number:true,
						maxlength:15,
						minlength:10
					},
					persoanaDeContact_email:{
						email: true
					},
					administrare_tipComision:{
						required: true
					},
                    administrare_valoareComision:{
						number:true,
						required: true
					},
					administrare_status:{
						required: true
					},
					administrare_contract:{
						required: true
					},
					alteDetalii_iban:{
						iban: true
					},
					alteDetalii_ro:{
						required: true
					}
                },

                messages: { 
					dateRecomandator_tip:{
						required: "Selecteaza tipul de recomandator."
					},
					dateRecomandator_numeDenumire:{
						required: "Acest camp este olbigatoriu."
					},
					dateRecomandator_cnpCui:{
						number: "Valoarea introdusa este necesar sa fie numerica"
					},
					adresaDomiciliuSediu_codPostal:{
						number: "Valoarea introdusa este necesar sa fie numerica"
					},
					adresaDomiciliuSediu_etaj:{
						number: "Valoarea introdusa este necesar sa fie numerica"
					},
					contact_telefon:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						maxlength: "Introduceti maxim 15 caractere",
						minlength: "Introduceti minim 10 caractere"
					},
					contact_email:{
						required: "Acest camp este olbigatoriu.",
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					persoanaDeContact_telefon:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						maxlength: "Introduceti maxim 15 caractere",
						minlength: "Introduceti minim 10 caractere"
					},
					persoanaDeContact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					administrare_tipComision:{
						required: "Acest camp este olbigatoriu."
						
					},
                    administrare_valoareComision:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						required: "Acest camp este olbigatoriu."
					},
					administrare_status:{
						required: "Acest camp este olbigatoriu."
					},
					administrare_contract:{
						required: "Acest camp este olbigatoriu."
					},
					alteDetalii_iban:{
						iban: "Nu ati introdus un IBAN valid."
					},
					alteDetalii_ro:{
						required: "Acest camp este olbigatoriu."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editDistribuitorPOST").validate({
 ignore: [],
   rules: {
					
					dateDistribuitor_numeDenumire:{
						required: true
					},
					contact_telefon:{
						number: true,
						required: true,
						minlength: 10,
						maxlength: 15
					},
					contact_email:{
						email: true,
						required: true
					},
					administrare_comisionAsigurari:{
						number: true,
						required: true
					},
					administrare_comisionAsistentaRutiera:{
						number: true,
						required: true
					},
                    administrare_comisionAlteProduse:{
						number: true,
						required: true
					},
					administrare_status:{
						required: true
					},
					administrare_contract:{
						required: true
					}
					
                },

                messages: { 
				
					dateDistribuitor_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					contact_telefon:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						required: "Acest camp este obligatoriu.",
						minlength: "Introduceti minim 10 caractere",
						maxlength: "Introduceti maxim 15 caractere"
					},
					contact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de email",
						required: "Acest camp este obligatoriu."
					},
					administrare_comisionAsigurari:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						required: "Acest camp este obligatoriu."
					},
					administrare_comisionAsistentaRutiera:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						required: "Acest camp este obligatoriu."
					},
                    administrare_comisionAlteProduse:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						required: "Acest camp este obligatoriu."
					},
					administrare_status:{
						required: "Acest camp este obligatoriu."
					},
					administrare_contract:{
						required: "Acest camp este obligatoriu."
					}
					
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editAgentiePOST").validate({
 ignore: [],
   rules: {
                    dateAgentie_tip:{
						required: true
					},
					dateAgentie_numeDenumire:{
						required: true
					},
					dateAgentie_cnpCui:{
						number: true,
						cuiCNP: true
					},
					adresaDomiciliuSediu_codPostal:{
						number: true
					},
					adresaDomiciliuSediu_etaj:{
						number: true
					},
					contact_telefon:{
						required: true,
						number:true,
						maxlength:15,
						minlength:10
					},
					contact_email:{
						required: true,
						email: true
					},
					persoanaDeContact_telefon:{						
						number:true,
						maxlength:15,
						minlength:10
					},
					persoanaDeContact_email:{
						email: true
					},
					administrare_distribuitor:{
						required: true
					},
					administrare_tipComision:{
						required: true
					},
					administrare_valoareComision:{
						required: true,
						number: true
					},
					administrare_status:{
						required: true
					},
					administrare_contract:{
						required: true
					},
					alteDetalii_ro:{
						required: true
					},
					alteDetalii_iban:{
						iban: true
					}
					
					
                },

                messages: { 
				
					dateAgentie_tip:{
						required: "Selectati tipul de agentie."
					},
					dateAgentie_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateAgentie_cnpCui:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					adresaDomiciliuSediu_codPostal:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					adresaDomiciliuSediu_etaj:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						required: "Acest camp este obligatoriu.",
						number: "Valoarea introdusa este necesar sa fie numerica.",
						maxlength: "Introduceti maxim 15 caractere.",
						minlength: "Introduceti minim 10 caractere."
					},
					contact_email:{
						required: "Acest camp este obligatoriu.",
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					persoanaDeContact_telefon:{						
						number: "Valoarea introdusa este necesar sa fie numerica.",
						maxlength: "Introduceti maxim 15 caractere.",
						minlength: "Introduceti minim 10 caractere."
					},
					persoanaDeContact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					administrare_distribuitor:{
						required: "Acest camp este obligatoriu."
					},
					administrare_tipComision:{
						required: "Acest camp este obligatoriu."
					},
					administrare_valoareComision:{
						required: "Acest camp este obligatoriu.",
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					administrare_status:{
						required: "Acest camp este obligatoriu."
					},
					administrare_contract:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_ro:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_iban:{
						iban: "Nu ati intodus un IBAN valid."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editAgentPOST").validate({
 ignore: [],
  rules: {
					dateAgent_tip:{
						required: true
					},
					dateAgent_numeDenumire:{
						required: true
					},
					dateAgent_cnpCui:{
						number: true,
						cuiCNP: true
					},
                    adresaDomiciliuSediu_codPostal:{
						number: true
					},
					adresaDomiciliuSediu_etaj:{
						number: true
					},
					contact_telefon:{
						required: true,
						number: true,
						minlength:10,
						maxlength:15
					},
					contact_email:{
						required: true,
						email: true
					},
					persoanaDeContact_telefon:{
						number: true,
						minlength:10,
						maxlength:15
					},
					persoanaDeContact_email:{
						email: true
					},
					administrare_distribuitor:{
						required: true
					},
					administrare_recomandator:{
						required: true
					},
					administrare_tipComision:{
						required: true
					},
					administrare_valoareComision:{
						required: true,
						number: true
					},
					administrare_tipVanzare:{
						required: true
					},
					administrare_status:{
						required: true
					},
					administrare_contract:{
						required: true
					},
					alteDetalii_ro:{
						required: true
					},
					alteDetalii_iban:{
						iban: true
					}
                },

                messages: {
					dateAgent_tip:{
						required: "Alegeti tipul de agent."
					},
					dateAgent_numeDenumire:{
						required: "Acest camp este obligatoriu."
					},
					dateAgent_cnpCui:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
                    adresaDomiciliuSediu_codPostal:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					adresaDomiciliuSediu_etaj:{
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					contact_telefon:{
						required: "Acest camp este obligatoriu.",
						number: "Valoarea introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere",
						maxlength: "Introduceti maxim 15 caractere"
					},
					contact_email:{
						required: "Acest camp este obligatoriu.",
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					persoanaDeContact_telefon:{
						number: "Valoarea introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere",
						maxlength: "Introduceti maxim 15 caractere"
					},
					persoanaDeContact_email:{
						email: "Campul trebuie sa fie de forma unei adrese de mail."
					},
					administrare_distribuitor:{
						required: "Acest camp este obligatoriu."
					},
					administrare_recomandator:{
						required: "Acest camp este obligatoriu."
					},
					administrare_tipComision:{
						required: "Acest camp este obligatoriu."
					},
					administrare_valoareComision:{
						required: "Acest camp este obligatoriu.",
						number: "Valoarea introdusa este necesar sa fie numerica."
					},
					administrare_tipVanzare:{
						required: "Acest camp este obligatoriu."
					},
					administrare_status:{
						required: "Acest camp este obligatoriu."
					},
					administrare_contract:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_ro:{
						required: "Acest camp este obligatoriu."
					},
					alteDetalii_iban:{
						iban: "Nu ati introdus un IBAN valid."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});
$("#CRM_editAngajatPOST").validate({
 ignore: [],
 rules: {
					dateAngajati_nume:{
						required:true
					},
					dateAngajati_departament:{
						required: true
					},
                    dateAngajati_cnp:{
						roCNP:true,
						required: true
					},
					adresaDomiciliu_codPostal:{
						number:true
					},
					adresaDomiciliu_etaj:{
						number:true
					},
					contact_telefon1:{
						number: true,
						minlength: 10,
						maxlength: 15
					},
					contact_telefon2:{
						number: true,
						minlength: 10,
						maxlength: 15
					},
					contact_email1:{
						email: true
					},
					contact_email2:{
						email: true
					},
					administrareAngajati_status:{
						required: true
					},
					administrareAngajati_rol:{
						required: true
					},
					alteDetalii_iban:{
						iban: true
					}
					
                },

                messages: {
					dateAngajati_nume:{
						required:  "Acest camp este obligatoriu."
					},
					dateAngajati_cnp:{						
						required: "Acest camp este obligatoriu"
					},
					dateAngajati_departament:{
						required:  "Acest camp este obligatoriu."
					},
					adresaDomiciliu_codPostal:{
						number: "Valoarea introdusa este necesar sa fie numerica.",
					},
					adresaDomiciliu_etaj:{
						number: "Valoarea introdusa este necesar sa fie numerica.",
					},
					contact_telefon1:{
						number: "Valoarea introdusa este necesar sa fie numerica.",
						minlength: "Introduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere"
					},
					contact_telefon2:{
						number: "Valoarea introdusa este necesar sa fie numerica",
						minlength: "Introduceti minim 10 caractere.",
						maxlength: "Introduceti maxim 15 caractere"
					},
					contact_email1:{
						email: "Campul trebuie sa fie de forma unei adrese de email."
					},
					contact_email2:{
						email: "Campul trebuie sa fie de forma unei adrese de email."
					},
					administrareAngajati_status:{
						required:  "Acest camp este obligatoriu."
					},
					administrareAngajati_rol:{
						required:  "Acest camp este obligatoriu."
					},
					alteDetalii_iban:{
						iban: "Nu ati introdus un IBAN valid."
					}
                },
				invalidHandler: function (event, validator) { //display error alert on form submit   
                    alert("Te rugam sa corectezi erorile din pagina!");
                }
});