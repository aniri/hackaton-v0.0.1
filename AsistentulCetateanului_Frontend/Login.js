import React from 'react';
import {Link} from 'react-router';

class Login extends React.Component {

  constructor() {
    super();
  }

  render() {
    return (
      <div>
        <p className="text">Asistentul Cetateanului</p>
        <form>
          <input type="text" placeholder="Email" className="bck" /><br/>
          <input type="password" placeholder="Parola" className="bck" /><br/>
          <input type="submit" className="bck" style={{background: "#82B440"}} />
        </form>
        <Link to="Register"><button className="bck" style={{background: "#999A50"}}>Creaza Cont</button></Link>
      </div>
    )
  }
}

export default Login;
