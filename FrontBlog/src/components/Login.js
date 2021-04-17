import React, { Component } from 'react'
import { getData } from '../services/index.js'
import { validateEmail } from '../helpers/helpers'
import { Redirect } from "react-router-dom";

export class Login extends Component {
    state = {
        mail: '',
        password: '',
        messageMail: '',
        messagePass: '',
        message: ''
    }

    checkData(data){
        let men = []
        let mail = (!validateEmail(data.mail) ? 'Mail not valid' : '')
        let pass = data.password === '' ? 'Password not valid' : ''

        if (mail === '' && pass === '') {
            men = []
        } else {
            men['mail'] = mail
            men['pass'] = pass
        }

        return men
    }

    resetMessages(){
        this.setState({messageMail: ''})
        this.setState({messagePass: ''})
    }

    _mailChange = (e) => {
        this.setState({mail: e.target.value})
    }

    _passChange = (e) => {
        this.setState({password: e.target.value})
    }
    
    _handleSubmit = async (e) => {
        let message = ''
        e.preventDefault()
        let men = this.checkData(this.state)
        if (men.length === 0) {
            let res
            this.resetMessages()
            const formData = new FormData()
            formData.append('request', 'login')
            formData.append('mail', this.state.mail)
            formData.append('password', this.state.password)
            
            res = await getData(formData)
            
            if (res.state === 1) {
                message = <article className="message is-primary">
                    <div className="message-header">
                    <p>Success!</p>
                    <button className="delete" aria-label="delete"></button>
                    </div>
                    <div className="message-body">
                        {res.message}
                    </div>
                </article>
                this.setState({message: message})
                setTimeout(() => {console.log("Continue!");}, 500);
                return <Redirect to="/register"/>
            } else {
                message = <article className="message is-danger">
                    <div className="message-header">
                    <p>Error!</p>
                    <button className="delete" aria-label="delete"></button>
                    </div>
                    <div className="message-body">
                    {res.message}
                    </div>
                </article>
                this.setState({message: message})
            }   
        } else {
            // Data bad
            if (men['mail'] !== '') {
                let messageMail = <article className="message is-danger">
                    <div className="message-body">
                        {men['mail']}
                    </div>
                </article>
                this.setState({messageMail: messageMail})
            }
            if (men['pass'] !== '') {
                let messagePass = <article className="message is-danger">
                    <div className="message-body">
                        {men['pass']}
                    </div>
                </article>
                this.setState({messagePass: messagePass})
            }
        }
    }
    
    render() {
        return (
            <form className="container is-max-desktop box block" onSubmit={this._handleSubmit}>
                <h1 className="title">Login</h1>
                <div className="columns is-mobile">
                    <div className="column is-three-fifths is-offset-one-fifth">
                        <div className="field">
                            <p className="control has-icons-left has-icons-right">
                                <input className="input block" type="email" placeholder="Email" onChange={this._mailChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-envelope"></i>
                                </span>
                                <span className="icon is-small is-right">
                                    <i className="fas fa-check"></i>
                                </span>
                            </p>
                            {this.state.messageMail}
                        </div>
                        <div className="field">
                            <p className="control has-icons-left">
                                <input className="input block" type="password" placeholder="Password" onChange={this._passChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-lock"></i>
                                </span>
                            </p>
                            {this.state.messagePass}
                        </div>
                        <div className="field">
                            <p className="control">
                                <button className="button is-success">Login</button>
                            </p><br/>
                            {this.state.message}
                        </div>
                    </div>
                </div>
            </form>
        );
    }
}


