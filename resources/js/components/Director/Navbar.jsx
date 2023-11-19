import React, {useEffect, useState} from "react";
import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import Offcanvas from 'react-bootstrap/Offcanvas';


export default function Guests() {

    //Проверяем право доступа
    // useEffect(() => {
    //     const abortController = new AbortController();
    //     fetch(`/api/getrole`, {
    //         signal: abortController.signal,
    //     })
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error(`Network response was not ok: ${response.status}`);
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             const answer = new Object(data)
    //             if(answer.role !== 'директор'){
    //                 const requestOptions = {method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify( {_token})};
    //                 fetch('/logout', requestOptions);
    //                 window.location.href = '/logout';
    //             }
    //         })
    //         .catch(error => {
    //             console.error(error.message);
    //             const requestOptions = {method: 'POST',headers: { 'Content-Type': 'application/json' },body: JSON.stringify( {_token})};
    //             fetch('/logout', requestOptions);
    //             window.location.href = '/logout';
    //         });
    //     return () => {
    //         abortController.abort();
    //     }
    // }, []);


    return (
        <>
            <div className=" container my-2 col-md-6">
                <div className="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <Navbar key='md' expand='md' data-bs-theme="dark" bg="primary" className="my-0">
                        <Container fluid>
                            <Navbar.Brand >My hotel</Navbar.Brand>
                            <Navbar.Toggle aria-controls={`offcanvasNavbar-expand-md`} />
                            <Navbar.Offcanvas
                                id={`offcanvasNavbar-expand-md`}
                                aria-labelledby={`offcanvasNavbarLabel-expand-md`}
                                placement="end"
                            >
                                <Offcanvas.Header closeButton>
                                    <Offcanvas.Title id={`offcanvasNavbarLabel-expand-md`}>
                                        Offcanvas
                                    </Offcanvas.Title>
                                </Offcanvas.Header>
                                <Offcanvas.Body>
                                    <Nav className="flex-grow-1 pe-3">
                                        <Nav.Link href="/director/staff">Сотрудники</Nav.Link>
                                        <Nav.Link href="/director/analysis">Анализ</Nav.Link>
                                    </Nav>
                                    <Nav className="justify-content-end flex-grow-1 pe-3">
                                        <form action="/logout" method='post'>
                                            <input type="hidden" name="_token" defaultValue={_token} />
                                            <input type="submit" value="Выход" className=" text-black btn" />
                                        </form>
                                    </Nav>
                                </Offcanvas.Body>
                            </Navbar.Offcanvas>
                        </Container>
                    </Navbar>
                </div>
            </div>
        </>

    )
}
