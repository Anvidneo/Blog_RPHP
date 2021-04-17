import { Component } from 'react'
import { Register } from './Register';

import { getData } from '../services/index.js'

export class UserChanges extends Component {
    state = {
        role: '',
        users: ''
    }

    _roleChange = (e) => {
        this.setState({role: e.target.value})
    }
    
    _usersSubmit = async (e) => {
        let users = ''
        e.preventDefault()
        let res
        const formData = new FormData()
        formData.append('request', 'users')
        formData.append('role', this.state.role)

        res = await getData(formData)
        console.log(res)
        if (res.state === 1) {
            (res.data).map((element, index) => {
            const { id, name, mail, phone, role } = element //destructuring
                users = <tr key={id}>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td>{mail}</td>
                    <td>{phone}</td>
                    <td>{role == 1 ? 'Admin' : 'User'}</td>
                </tr>
            })
            this.setState({users: users})
        } else {
            users = <article className="message is-danger">
                <div className="message-header">
                <p>Error!</p>
                <button className="delete" aria-label="delete"></button>
                </div>
                <div className="message-body">
                    {res.message}
                </div>
            </article>
            this.setState({users: users})
        }
    }

    render() {
        return (
            <div className="column">
                <div className="card">
                    <div className="card-content">
                        <div className="content">
                            <section className="section">
                                <h1 className="title">New User</h1>
                                <Register />
                            </section>
                            <section className="section">
                                <h1 className="title">Users</h1>
                                <div className="field">
                                    <div className="select is-rounded has-icons-left">
                                        <select onChange={this._roleChange}>
                                            <option> Select role </option>
                                            <option value="1"> Administrator </option>
                                            <option value="0"> User </option>
                                            <option value=""> All </option>
                                        </select>
                                    </div>
                                    <div className="field"><br/>
                                        <p className="control">
                                            <button onClick={this._usersSubmit} className="button is-success">Consult</button>
                                        </p>
                                    </div><br/>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mail</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        {this.state.users}
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}


