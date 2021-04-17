import { Component } from 'react'

export class Menu extends Component {
    render() {
        return (
            <aside className="menu">
                <p className="menu-label"> General </p>
                <ul className="menu-list">
                    <li><a href="/home"> Home </a></li>
                    <li><a href="/post"> Posts </a></li>
                </ul>
                <p className="menu-label"> Administration </p>
                <ul className="menu-list">
                    <li><a href="/userchanges"> Users Settings and Changes </a></li>
                </ul>
            </aside>
        );
    }
}


