import React, { Component } from 'react';
import { BrowserRouter  as Router, Switch, Route } from 'react-router-dom';
import { Login } from './components/Login';
import { Register } from './components/Register';
import { Footer } from './components/AplicationUtilities/Footer';
import { Navbar } from './components/AplicationUtilities/Navbar';
import { Menu } from './components/AplicationUtilities/Menu';
import { UserChanges } from './components/UserChanges';
import { Post } from './components/Post';

import './App.css';
import 'bulma/css/bulma.css';

class App extends Component {
  render () {
    return (
      <div className="App block">
        <Navbar/><br/><br/>
        <div className="tile is-ancestor">
          <Menu className="tile is-parent" />
          <Router className="tile is-vertical is-8">
            <Switch className="tile is-parent is-vertical">
                <Route exact path={`/`} component={Login} />
                <Route exact path={`/post`} component={Post} />
                <Route exact path={`/userchanges`} component={UserChanges} />
                <Route exact path="/login"><Login className="block"/> </Route>
                <Route exact path="/register"><Register className="block"/></Route>
            </Switch>
          </Router>
        </div>
        <Footer/>
      </div>
    );
  }
}

export default App;
