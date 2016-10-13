import React from 'react';
import {Link, hashHistory} from 'react-router';

class Register extends React.Component {

  constructor() {
    super();
    this.CNPvalidation = this.CNPvalidation.bind(this);
    this.Submit = this.Submit.bind(this);
  }

  CNPvalidation() {
    return true;
    let cnp = document.getElementById("cnp").value;
    if(/^[0-9]+$/.test(cnp) == false ) {
      return false;
    }
    if(cnp.length == 13) {
      var cnpCharArray = cnp.split("");
      var controlSum = 0;
      var controlArray = new Array(2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9);
      for(var i = 0; i < 12; i++) {
        controlSum += parseInt(cnpCharArray[i]) * controlArray[i];
      }
      var controlDigit = controlSum % 11;
      if(controlDigit == 10) {
        controlDigit = 1;
      }
      if(controlDigit != parseInt(cnpCharArray[12])) {
        return false;
      } else {
        return true;
      }
    }
    return false;
  }

  EMAILvalidation() {
    let email = document.getElementById("email").value;
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  Submit(e) {
    e.preventDefault();
    if(this.CNPvalidation() && this.EMAILvalidation()) {
      let name = document.getElementById('nume').value;
      let surname = document.getElementById('prenume').value;
      let ssn = document.getElementById('cnp').value;
      let email = document.getElementById('email').value;
      let pwd = document.getElementById('passwd').value;
      let address = document.getElementById('address').value;

      var req = new XMLHttpRequest();
      req.open('POST','http://govithub.whitecitycode.com:5984/citizens');
      req.setRequestHeader('Content-Type', 'application/json');
      req.setRequestHeader('Accept', 'application/json');
      req.send(JSON.stringify(
        {name: name + ' ' + surname, email: email, pass: pwd, 
          personal_info: {address: address, ssn: ssn}, 
          subscriptions: {}}));
      hashHistory.push('Tags');
    } else if(this.CNPvalidation()) {
      alert("Email incorect");
    } else if(this.EMAILvalidation()){
      alert("CNP incorect");
    } else {
      alert("CNP si Email incorecte");
    }
  }

  render() {
    return (
      <div>
      <p className="text">Asistentul Cetateanului</p>
      <form>
        <input type="text" placeholder="Nume" className="bck" id="nume" /><br/>
        <input type="text" placeholder="Prenume" className="bck" id="prenume" /><br/>
        <input type="text" placeholder="CNP" className="bck" id="cnp" /><br/>
        <input type="text" placeholder="Adresa" className="bck" id="address" /><br/>
        <input type="text" placeholder="Numele Utilizatorului" className="bck" id="username" /><br/>
        <input type="text" placeholder="Email" className="bck" id="email" /><br/>
        <input type="password" placeholder="Parola" className="bck" id="passwd" /><br/>
        <input type="submit" className="bck" style={{background: "#82B440"}} onClick={this.Submit} />
      </form>
      </div>
    )
  }
}

export default Register;
