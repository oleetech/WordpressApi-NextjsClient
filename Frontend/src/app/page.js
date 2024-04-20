"use client";
import Image from "next/image";
import Navbar from './components/Navbar';
import Menu from './components/Menu';
import Projects from "./sections/Projects";
import Users from "./components/Users";
import Tags from "./components/Tags";
import Categories from "./components/Categories";
import PageList from "./components/PageList";
import SoftwareList from "./components/SoftwareList";
import Logo from "./components/Logo";
import PostsLoop from "./components/PostsLoop";
import SlidersLoop from "./components/SlidersLoop";
import AboutComponent from "./components/AboutComponent";
export default function Home() {
  return (
    <main className="flex min-h-screen flex-col items-center justify-between ">
  
       <AboutComponent/>
    </main>
  );
}
