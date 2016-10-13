import React, { Component } from 'react';
import './about.css';
import { Grid, Row, Col } from 'react-bootstrap';
import { Card, CardTitle, CardText, CardActions, Button } from 'react-mdl';
export default class About extends Component {
  render() {
    return (
      <div id="about" className="section">
      <Grid>
        <Row>
          <Col md={12} sm={12} xs={12} >
            <h2 className="title">
              Intreprinderile sociale inregistrate saptamana asta
            </h2>
          </Col>
          <Col md={12} sm={12} xs={12} >
            <Col md={4} sm={4} xs={12} >
              <Card shadow={0} style={{width: '320px', background: 'url(sacosa.jpg) top no-repeat', height: '320px', margin: 'auto'}}>
                <CardTitle expand style={{ color: '#fff', background: 'rgba(0,0,0,0.5)'}}>Sacosa de panza</CardTitle>
                <CardText>
                Lorem ipsum dolor sit amet.
                <br />
                <i className="fa fa-map-marker" aria-hidden="true"></i> Bucuresti | <i className="fa fa-users" aria-hidden="true"></i>: 5 | <i className="fa fa-money" aria-hidden="true"></i>: 200.000 RON
                </CardText>
                <CardActions border>
                  <Button colored>Vezi detalii</Button>
                </CardActions>
              </Card>
            </Col>
            <Col md={4} sm={4} xs={12} >
              <Card shadow={0} style={{width: '320px', height: '320px', background: 'url(masina.jpg) top no-repeat', margin: 'auto'}}>
                <CardTitle expand style={{ color: '#fff', background: 'rgba(0,0,0,0.5)'}}>Masina electrica</CardTitle>
                <CardText>
                Lorem ipsum dolor sit amet<br />
                <i className="fa fa-map-marker" aria-hidden="true"></i> Ploiesti | <i className="fa fa-users" aria-hidden="true"></i>: 20 | <i className="fa fa-money" aria-hidden="true"></i>: 1.2M RON
                </CardText>
                <CardActions border>
                  <Button colored>Vezi detalii</Button>
                </CardActions>
              </Card>
            </Col>
            <Col md={4} sm={4} xs={12} >
              <Card shadow={0} style={{width: '320px', height: '320px', background: 'url(recycle.jpg) top no-repeat', margin: 'auto'}}>
                <CardTitle expand style={{ color: '#fff', background: 'rgba(0,0,0,0.5)'}}>Reciclam mai mult</CardTitle>
                <CardText>
                Lorem ipsum dolor sit amet<br />
                <i className="fa fa-map-marker" aria-hidden="true"></i> Constanta | <i className="fa fa-users" aria-hidden="true"></i>: 9 | <i className="fa fa-money" aria-hidden="true"></i>: 400.000 RON
                </CardText>
                <CardActions border>
                  <Button colored>Vezi detalii</Button>
                </CardActions>
              </Card>
            </Col>
          </Col>
        </Row>
      </Grid>
      </div>
    );
  }
}
