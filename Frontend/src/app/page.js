"use client";
import Image from "next/image";
import ScrollListener from "./components/ScrollListener";
import Divider from "./components/Devider";
import DeviderGradient from "./components/DeviderGradient";
import TeamComponent from "./components/TeamComponent";
import PortfolioComponent from "./components/PortfolioComponent";
import Navigations from "./components/Navigations";
import Hero from "./components/Hero";
import Footer from "./components/Footer";
import Section from "./components/Section";
import Title from "./components/Title";
import Pricing from "./components/Pricing";
import CallToAction from "./components/CallToAction";
import PostsLoop from "./components/PostsLoop";
export default function Home() {
  return (
    <>
    <main className="flex min-h-screen flex-col items-center justify-between gradient">
  <ScrollListener/>
       <Navigations/>
       <Hero/>
       <DeviderGradient/>

    </main>
    <Section/>
    <Title/>
    <Pricing/>
<Divider/>
    <CallToAction/>
<PostsLoop/>
    <Footer/>
    </>
  );
}
