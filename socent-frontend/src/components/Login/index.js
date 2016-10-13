import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
export default class Login extends React.Component {
  constructor(){
    super();
    this.sendFormData = this.sendFormData.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  handleSubmit(event) {
    event.preventDefault();
    this.setState({ type: 'info', message: 'Sending...' }, this.sendFormData);
  }
  sendFormData() {
    // Fetch form values.
    const formData = {
      f: ReactDOM.findDOMNode(this.refs.f).value,
      ipn: ReactDOM.findDOMNode(this.refs.ipn).value
    };
    axios({
      method: 'post',
      url: 'http://govauth.whiz.ro/external/login.php',
      data: formData
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
  }
  render() {
    return (
      <form className="navbar-form navbar-right" action="" onSubmit={this.handleSubmit}>
        <input type="hidden" ref="f" name="f" value="ApiLogin" />
        <input type="hidden" name="ipn" ref="ipn" value="https://gov-ithub.github.io/socent-dashantrep/dist/index#/index/dashboard" />
        <button className="btn btn-primary" type="submit">Login with GovAuth</button>
      </form>
    );
  }
}
