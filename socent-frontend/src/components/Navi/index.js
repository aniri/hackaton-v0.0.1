import React, { Component } from 'react';
import Img from '../Img';
import navlogo from '../../assets/img/nav-logo.png';

import { Navbar, Nav, NavItem } from 'react-bootstrap';
export default class Navi extends Component {
  render() {
    return (
      <Navbar inverse>
        <Navbar.Header>
          <Navbar.Brand>
            <a href="#">
              <Img src={navlogo} alt="Bine ati venit" />
            </a>
          </Navbar.Brand>
          <Navbar.Toggle />
        </Navbar.Header>
        <Navbar.Collapse>
          <Nav pullRight>
            <NavItem eventKey={1} href={this.props.sections.services}>MENU</NavItem>
            <NavItem eventKey={2} href={this.props.sections.clients}>MENU</NavItem>
            <NavItem eventKey={3} href={this.props.sections.team}>MENU</NavItem>
            <NavItem eventKey={4} href={this.props.sections.contact}>MENU</NavItem>
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    )
  }
}
