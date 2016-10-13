import React, { Component } from 'react';
import Contact from './components/Contact';
import Footer from './components/Footer';
import Img from './components/Img';
import About from './components/About';
// import Login from './components/Login';
import A from './components/A';
import { Navbar, Nav, NavItem } from 'react-bootstrap';
import './App.css';
import './components/Navi/navi.css';
import { StickyContainer, Sticky } from 'react-sticky';


class App extends Component {
  render() {
    return (
      <div>
        <StickyContainer>
          <Sticky>
          <Navbar inverse>
            <Navbar.Header>
              <Navbar.Brand>
                <a id="logo" href="#home">
                  <Img src='nav-logo.jpg' alt="Bine ati venit" />
                </a>
              </Navbar.Brand>
              <Navbar.Toggle />
            </Navbar.Header>
            <Navbar.Collapse>
              <Nav pullRight>
                <NavItem eventKey={1}>Economia Sociala</NavItem>
                <NavItem eventKey={2}>Inregistrare</NavItem>
                <NavItem eventKey={4}>Contact</NavItem>
                <A className="btn btn-primary login" href='https://gov-ithub.github.io/socent-dashantrep/dist/index#/index/dashboard'>Login with GovAuth</A>
              </Nav>
            </Navbar.Collapse>
          </Navbar>
          </Sticky>
          <Contact />
          <About />
          <Footer />
        </StickyContainer>

      </div>
    );
  }
}
export default App;
