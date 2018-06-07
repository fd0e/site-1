---
author: ~ben
published: true
title: goals and roadmap
category: 
    - main
---

# tilde.team goals and roadmap

[living draft of this document](https://pad.tilde.team/code/#/2/code/edit/RFBUqXec+9+MlZzx4mnhU3ps/)

these ideas are partly about building one system (in this case, tilde.team) but also about supporting a 
broader ecosystem of inter-connected systems.

1. develop a clear system identity as an alternative social environment for the techncially-inclined; 
specifically, serving as a non-commercial alternative to the mainstream, corporate-owned media and social media. 
the dual points of (1) an alternative social/communications medium and (2) technically inclined user base are  
important because, together, they put the users in the role of protecting (and enjoying!) the tools of 
communication that are currently being neutered by corporate commodification of the www.

2. related to #1, focus on cultivating a technically-inclined user base that is aware of the societal value of 
non-commercial, alternative communication and social media. (not all users have to be code wizards, but it's safe 
to assume that the very premise of a command-line platform will weed out pure-GUI people.)

3. provide tools, resources and encouragement for users to develop ideas and best practices for the next 
generation of public access unix systems (in this case, in the form of a tilde box [1]).  the "next generation" is 
always ahead of the present, so this implies that the system is in a constant state of development and 
self-improvement, with a continually rolling set of goals, and regular testing and evaluation of experimental 
projects. --all of which is powered by user involvement in a brainstorming/experimenting/teaching/learning/doing 
model.

4. related to #3, really emphasize that learning through doing is a core theme of the system.

5. serve partly as a meta-community among other tildes and pubnixes, both spreading best practices to them and 
learning from experiences from them.

6. through this development (#5) of interconnections among similar communities, develop trusted individual-based 
communication networks among many similar systems. here's where that federation concept comes in, possibly 
allowing people to have a 'home' system, and to use those credentials to visit other systems as well.

7. last but absolutely not least --> MAKE IT FUN!  it should not be a bitter place to sulk or rant about the
mainstream. it should be a social environment in which users can go wild and push their creative skills to the 
limit. it should be a place to appreciate what does not exist on facebook and other exploitative commercial 
environments.

8. idea mill:
* if software development is a main activity to be encouraged among the users, provide a forum for saying "here's an idea; who wants to develop it?"
    * this could happen somewhere on the [forum](https://forum.tilde.team) (which would also need some love from the devs)
* this would allow people to find co-developers, or to allow non-devs to give devs good ideas.


## services

* mail
    - this is currently just forwarding addresses from google domains
    - you can send from @tilde.team addresses with gmail smtp
    - future state: tilde.team mailserver? webmail? local delivery mail?
    - i'd like to keep publicly deliverable mail as a thing
    - google domains limits to 100 forwarding addresses
* irc
* mastodon/activitypub social
    - [halcyon](https://halcyon.tilde.team) and [pinafore](https://pinafore.bhh.sh) clients
    - is it worth switching to pleroma? there is no good way to migrate, but it's significantly faster and lighter on resources
* forum - this project needs a lot of love (https://git.tilde.team/meta/forum) but it's got potential
* [gitea](https://git.tilde.team)
* [cryptpad](https://pad.tilde.team)


## future plans

* ldap auth
* some kind of pastebin
* nextcloud?
* onlyoffice
* mumble/teamspeak
* sshkey only
    * disable password auth
    * this will require documentation and communication of the plan
* ~ben shouldn't be the single point of failure. need a way to pass command to another admin if i go MIA.


## to do

* come up with a community charter
* terms of use
* aup
* better documentation
