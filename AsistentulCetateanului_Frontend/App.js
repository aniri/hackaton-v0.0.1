import React from 'react';
import {hashHistory, Router, IndexRoute, Route} from 'react-router';
import Login from './Login.js';
import Register from './Register.js';
import Tags from './Tags.js';

const App = () => (
  <Router history={hashHistory} >
   <Route path="/" component={Main} >
    <IndexRoute component={Login} />
    <Route path="Register" component={Register} />
    <Route path="Tags" component={Tags} />
   </Route>
  </Router>
)

class Main extends React.Component {

  render() {
    return (
      <div>
        <main>{this.props.children}</main>
      </div>
    )
  }
}

export default App;
