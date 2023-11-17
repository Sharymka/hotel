import React from "react";
import {Link, Route, Routes} from "react-router-dom";
import Booking from "../routes/Booking.jsx";
import AddBooking from "../routes/AddBooking.jsx";
import Rooms from "../routes/Rooms.jsx";
import Room from "../routes/Room.jsx";
import Staff from "../routes/Staff.jsx";
import Employee from "../routes/Employee.jsx";
import Tasks from "../routes/Tasks.jsx";


export default function Admin (){

    return( <>
        <div className="  d-flex">
            <nav style={{ padding: '20px' }} className="col-md-2 d-none d-md-block bg-light sidebar">
                <div className="sidebar-sticky">
                    <ul className="nav flex-column">
                        <div className="d-flex align-content-center">
                            <Link to="/" className="nav-link text-black">Главная</Link>
                        </div>
                        <div className="d-flex align-content-center">
                            <Link to="/booking" className="nav-link text-black">Бронирование</Link>
                        </div>
                        <Link to="/rooms" className="nav-link text-black">Комнаты</Link>
                        {/*<Link to="/guests" className="nav-link">Гости</Link>*/}
                        {/*<Link to="/materials" className="nav-link">Материалы</Link>*/}
                        <div className="d-flex align-content-center ">
                            <Link to="/staff" className="nav-link text-black ">Сотрудники</Link>
                        </div>
                        <Link to="/tasks" className="nav-link text-black">Задачи</Link>
                    </ul>
                </div>
                    <form action="/logout" method='post'>
                        <input type="hidden" name="_token" defaultValue={_token} />
                        <input type="submit" value="Выход" className=" text-black btn" />
                    </form>
            </nav>
            <Routes>
                <Route path="/booking" element={<Booking />} />
                <Route path="/addBooking" element={<AddBooking />} />
                <Route path="/rooms" element={<Rooms />} />
                <Route path="/room/:id" element={<Room />} />
                <Route path="/staff" element={<Staff />} />
                <Route path="/employee/:id" element={<Employee />} />
                <Route path="/tasks" element={<Tasks />} />
            </Routes>
        </div>

    </>)
}
