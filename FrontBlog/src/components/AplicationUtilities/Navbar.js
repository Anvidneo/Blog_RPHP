import { Component } from 'react'
import { Route } from 'react-router-dom';
import { Home } from '../Home';

export class Navbar extends Component {
    render() {
        return (
            <nav className="navbar" role="navigation" aria-label="main navigation">
                <div className="navbar-brand">
                    <a className="navbar-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Blogger_logo.svg/1200px-Blogger_logo.svg.png" width="112" height="28" />
                    </a>
                    <a role="button" className="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navbarBasicExample" className="navbar-menu">
                    <div className="navbar-start">
                        <a className="navbar-item" href="/home"> Home</a>
                        <a className="navbar-item" href="/post"> Posts</a>

                        <div className="navbar-item has-dropdown is-hoverable">
                            <a className="navbar-link" >Categories</a>
                            <div className="navbar-dropdown">
                                <a className="navbar-item">Category 1</a>
                                <a className="navbar-item">Category 2</a>
                                <a className="navbar-item">Category 3</a>
                            </div>
                        </div>
                    </div>

                    <div className="navbar-end">
                        <div className="navbar-item">
                            <div className="buttons">
                                <a className="button is-primary" href="/register">
                                    <strong>Sign up</strong>
                                </a>
                                <a className="button is-light" href="/login">
                                    Log in
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        );
    }
}


