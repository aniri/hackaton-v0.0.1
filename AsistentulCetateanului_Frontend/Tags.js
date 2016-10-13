import React from 'react';
import {Grid, Row, Col, Modal, Button, Checkbox, FormGroup} from 'react-bootstrap';

var tagsArray = ["#masina", "#casa", "#meteo"];
var contentArray = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
var selected;

class Tags extends React.Component {

  constructor() {
    super();
    this.state = {
      hashtags: tagsArray,
      content: contentArray,
      value: "",
      showModal: false
    }
    this.openAdditional = this.openAdditional.bind(this);
    this.showModal = this.showModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
  }

  componentDidMount() {
    var source = new EventSource("http://govithub.whitecitycode.com:5984/notifications/_changes?feed=eventsource&include_docs=true");
    source.onmessage = function(e) {
      console.log(e.data);
    }
  }

  openAdditional(e) {
    selected = e.target.innerHTML;
    this.showModal();
  }

  showModal() {
    this.setState({
      showModal: true
    })
  }

  closeModal() {
    this.setState({
      showModal: false
    })
  }

  render() {
    var mappedHashtags = this.state.hashtags.map(tag => <li key={tag} onClick={this.openAdditional}>{tag}</li>);
    var additionalInfoText;
    switch (selected) {
      case "#masina":
        additionalInfoText = <Car />;
        break;
      case "#casa":
        additionalInfoText = <Home />;
        break;
      case "#meteo":
        additionalInfoText = <Weather />;
        break;
      default:
        additionalInfoText = "Acest tag nu exista!";
    }
    return (
      <div>
      <div id="header">
        <img style={{height: "10vh", float: "left", marginLeft: "5vw"}} src="images/govithub.png" />
        <p id="wlcm">Buna ziua Ana!</p>
      </div>
      <Grid fluid>
        <Row>
          <Col xs={2} style={{background: "#82B440"}}>
            <ul>{mappedHashtags}</ul>
            <input type="text" placeholder="Cauta aici" id="search"/>
          </Col>
          <Col xs={10} style={{background: "#2D3A4B"}}>
            {this.state.content}
          </Col>
        </Row>
      </Grid>
      <Modal show={this.state.showModal} onHide={this.closeModal} className="modaltext">
        <Modal.Header closeButton>
          <Modal.Title>{selected}</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <AdditionalInfo categorytext={additionalInfoText} />
        </Modal.Body>
        <Modal.Footer>
          <button className="sendbutton" onClick={this.closeModal}>Trimite</button>
        </Modal.Footer>
      </Modal>
      </div>
    )
  }
}

class AdditionalInfo extends React.Component {
    render() {
      return (
        <div>
          {this.props.categorytext}
        </div>
      )
    }
}

var carInstance = <FormGroup>
  <Checkbox inline>RCA</Checkbox>
  {' '}
  <Checkbox inline>Rovinieta</Checkbox>
  {' '}
  <Checkbox inline>Amenzi</Checkbox>
  {' '}
  <Checkbox inline>Impozit</Checkbox>
  <br />
  <input type="text" placeholder="VIN" className="bck" />
  <br />
  <input type="text" placeholder="Nr. inmatriculare" className="bck" />
</FormGroup>;

class Car extends React.Component {

  constructor() {
    super();
    this.state = {
      carInstances: [carInstance]
    }
    this.add = this.add.bind(this);
  }

  add() {
    this.setState({
      carInstances: this.state.carInstances.concat([carInstance])
    })
  }

  render() {
    return (
      <div>
        <form>
          {this.state.carInstances}
          <button className="sendbutton" style={{background: "#2D3A4B"}} onClick={this.add}>Adauga</button>
        </form>
        <br />
      </div>
    )
  }
}

var homeInstance = <FormGroup>
  <Checkbox inline>Impozit</Checkbox>
  {' '}
  <Checkbox inline>Asigurare</Checkbox>
  <br />
  <input type="text" placeholder="Adresa" className="bck" />
</FormGroup>;

class Home extends React.Component {

  constructor() {
    super();
    this.state = {
      homeInstances: [homeInstance]
    }
    this.add = this.add.bind(this);
  }

  add() {
    this.setState({
      homeInstances: this.state.homeInstances.concat([homeInstance])
    })
  }

  render() {
    return (
      <div>
        <form>
          {this.state.homeInstances}
          <button className="sendbutton" style={{background: "#2D3A4B"}} onClick={this.add}>Adauga</button>
        </form>
        <br />
      </div>
    )
  }
}

var weatherInstance = <FormGroup>
  <input type="text" placeholder="Locatie" className="bck" />
</FormGroup>;

class Weather extends React.Component {

  constructor() {
    super();
    this.state = {
      weatherInstances: [weatherInstance]
    }
    this.add = this.add.bind(this);
  }

  add() {
    this.setState({
      weatherInstances: this.state.weatherInstances.concat([weatherInstance])
    })
  }

  render() {
    return (
      <div>
        <form>
          {this.state.weatherInstances}
          <button className="sendbutton" style={{background: "#2D3A4B"}} onClick={this.add}>Adauga</button>
        </form>
        <br />
      </div>
    )
  }
}

export default Tags;
