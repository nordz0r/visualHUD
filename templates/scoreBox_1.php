/* --- TOP LEFT SCORE BOX --- */
<?
	$rowHeight = 16;
	$baseTop = $menuItem->coordinates->top;
	$tailTop = $menuItem->coordinates->top + $rowHeight
	
?>
menuDef {
	name "ScoreFrame"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect <?= $menuItem->coordinates->left ?> <?= $baseTop ?> 32 256
	
//Score Frame BG, can be scaled wider if needed to make more room for names	
	itemDef {
     	name "scoreboxl"
		rect -1.5 -5.5 8 63
		visible 1
		decoration
		backcolor 1 1 1 0.57
		style 1
		background "ui/assets/hud/scoreboxl2.tga"
	}
	itemDef {
     	name "scorebox2"
		rect 6.5 -5.5 137 63 
		visible 1
		decoration
		backcolor 1 1 1 0.57
		style 1
		background "ui/assets/hud/scoreboxm.tga"
	}
	itemDef {
     	name "scorebox3"
		rect 143.5 -5.5 8 63 
		visible 1
		decoration
		backcolor 1 1 1 0.57
		style 1
		background "ui/assets/hud/scoreboxr.tga"
	}
}

// RED TEAM BAR TOP
menuDef {
	name "RedFrameTeam"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $baseTop ?> 32 256
	ownerdrawflag CG_SHOW_IF_RED_IS_FIRST_PLACE// AND CG_SHOW_ANYNONTEAMGAME
	
	//red team flag alert - top left
	itemDef {
     	name "TeamRLeft"
		rect 2 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/rteambgl.tga"
		ownerdrawflag CG_SHOW_RED_TEAM_HAS_BLUEFLAG
	}
	//red team flag alert - bottom right
	itemDef {
     	name "TeamRLeft"
		rect 22 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/rteambgr.tga"
		ownerdrawflag CG_SHOW_RED_TEAM_HAS_BLUEFLAG
	}
		
	//clan arena count
	itemDef {
		name "clanArena"
		rect 4 4 21 11
		visible 1
		backcolor 1 1 1 1
		decoration	
		style 1
	    cvartest g_gametype
		showcvar { 3,4 }
		background "ui/assets/score/ca_score_red.tga"
	}
    itemdef {
	    name "redClanPlayers"
//	    ownerdrawflag CG_SHOW_CLAN_ARENA
	    ownerdraw CG_RED_CLAN_PLYRS  
   	    rect 16 14 136 40
   	    visible 1
	    textscale .18
	    forecolor 1 1 1 0.65
	    decoration
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		bordercolor 1 1 1 1
		decoration	
		style 3
		ownerdrawflag CG_SHOW_HARVESTER                 
		background "icons/skull_red.tga"
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		decoration
		ownerdrawflag CG_SHOW_CTF                       
		ownerdraw CG_RED_FLAGSTATUS
	}
}

// RED TEAM BAR BOTTOM
menuDef {
	name "RedFrameTeam"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $tailTop ?> 32 256
	ownerdrawflag CG_SHOW_IF_BLUE_IS_FIRST_PLACE

	//red team flag alert - top left
	itemDef {
     	name "TeamRLeft"
		rect 2 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/rteambgl.tga"
		ownerdrawflag CG_SHOW_RED_TEAM_HAS_BLUEFLAG
	}
	//red team flag alert - bottom right
	itemDef {
     	name "TeamRLeft"
		rect 22 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/rteambgr.tga"
		ownerdrawflag CG_SHOW_RED_TEAM_HAS_BLUEFLAG
	}
		
	//clan arena count
	itemDef {
		name "clanArena"
		rect 4 4 21 11
		visible 1
		backcolor 1 1 1 1
		decoration	
		style 1
	    cvartest g_gametype
		showcvar { 3,4 }
		background "ui/assets/score/ca_score_red.tga"
	}
    itemdef {
	    name "redClanPlayers"
//	    ownerdrawflag CG_SHOW_CLAN_ARENA
	    ownerdraw CG_RED_CLAN_PLYRS  
		rect 16 14 136 40
   	    visible 1
	    textscale .18
	    forecolor 1 1 1 0.65
	    decoration
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		bordercolor 1 1 1 1
		decoration	
		style 3
		ownerdrawflag CG_SHOW_HARVESTER                 
		background "icons/skull_red.tga"
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		decoration
		ownerdrawflag CG_SHOW_CTF                       
		ownerdraw CG_RED_FLAGSTATUS
	}

	itemDef {
		name "oneflagstatus"
		rect 3 3 13 13
		visible 1
		decoration                	
		ownerdraw CG_ONEFLAG_STATUS 
	}
}
// BLUE TEAM BAR TOP
menuDef {
	name "BlueFrameTeam"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $baseTop ?> 32 256
	ownerdrawflag CG_SHOW_IF_BLUE_IS_FIRST_PLACE

	//blue team flag alert - top left
	itemDef {
     	name "TeamRLeft"
		rect 2 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/bteambgl.tga"
		ownerdrawflag CG_SHOW_BLUE_TEAM_HAS_REDFLAG
	}
	//blue team flag alert - bottom right
	itemDef {
     	name "TeamRLeft"
		rect 22 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/bteambgr.tga"
		ownerdrawflag CG_SHOW_BLUE_TEAM_HAS_REDFLAG
	}
		
	//clan arena count
	itemDef {
		name "clanArena"
		rect 4 4 21 11
		visible 1
		backcolor 1 1 1 1
		decoration	
		style 1
	    cvartest g_gametype
		showcvar { 3,4 }
		background "ui/assets/score/ca_score_blu.tga"
	}
    	itemdef {
	    name "blueClanPlayers"
	    ownerdrawflag CG_SHOW_CLAN_ARENA
	    ownerdraw CG_BLUE_CLAN_PLYRS  
   	   rect 16 14 136 40
   	    visible 1
	    textscale .18
	    forecolor 1 1 1 0.65
	    decoration
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		bordercolor 1 1 1 .75
		decoration	
		style 3
		ownerdrawflag CG_SHOW_HARVESTER                 
		background "icons/skull_blue.tga"
	}
	itemDef {
		name "blueflag"
		rect 3 3 13 13
		visible 1
		decoration    
		ownerdrawflag CG_SHOW_CTF                    	
		ownerdraw CG_BLUE_FLAGSTATUS
	}
	itemDef {
		name "oneflagstatus"
		rect 3 3 13 13
		visible 1
		decoration                	
		ownerdraw CG_ONEFLAG_STATUS 
	}
}
// BLUE TEAM BAR BOTTOM
menuDef {
	name "BlueFrameTeam"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $tailTop ?> 32 256
	ownerdrawflag CG_SHOW_IF_RED_IS_FIRST_PLACE// AND CG_SHOW_ANYNONTEAMGAME

	//blue team flag alert - top left
	itemDef {
     	name "TeamRLeft"
		rect 2 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/bteambgl.tga"
		ownerdrawflag CG_SHOW_BLUE_TEAM_HAS_REDFLAG
	}
	//blue team flag alert - bottom right
	itemDef {
     	name "TeamRLeft"
		rect 22 2 128 15 
		visible 1
		decoration
		backcolor 1 0 0 0.3
		style 1
		background "ui/assets/hud/bteambgr.tga"
		ownerdrawflag CG_SHOW_BLUE_TEAM_HAS_REDFLAG
	}
		
	//clan arena count
	itemDef {
		name "clanArena"
		rect 4 4 21 11
		visible 1
		backcolor 1 1 1 1
		decoration	
		style 1
	    cvartest g_gametype
		showcvar { 3,4 }
		background "ui/assets/score/ca_score_blu.tga"
	}
    itemdef {
	    name "blueClanPlayers"
	    ownerdrawflag CG_SHOW_CLAN_ARENA
	    ownerdraw CG_BLUE_CLAN_PLYRS  
   	    rect 16 14 136 40
   	    visible 1
	    textscale .18
	    forecolor 1 1 1 0.65
	    decoration
	}
	itemDef {
		name "f"
		rect 3 3 13 13
		visible 1
		bordercolor 1 1 1 .75
		decoration	
		style 3
		ownerdrawflag CG_SHOW_HARVESTER                 
		background "icons/skull_blue.tga"
	}
	itemDef {
		name "blueflag"
		rect 3 3 13 13
		visible 1
		decoration    
		ownerdrawflag CG_SHOW_CTF                    	
		ownerdraw CG_BLUE_FLAGSTATUS
	}
	itemDef {
		name "oneflagstatus"
		rect 3 3 13 13
		visible 1
		decoration                	
		ownerdraw CG_ONEFLAG_STATUS 
	}
}

// DM/TOURNAMENT BAR
menuDef {
	name "SelfFrameHighlights"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $baseTop ?> 32 256

	//self top highlight
	itemDef {
     	name "SelfTLeft"
		rect 2 2 16 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonl.tga"
	}
	itemDef {
     	name "SelfTMid"
		rect 18 2 114 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonm.tga"
	}
	itemDef {
     	name "SelfTLeft"
		rect 132 2 16 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonr.tga"
	}
	//self bottom highlight
	itemDef {
     	name "SelfBLeft"
		rect 2 18 16 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_NOT_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonl.tga"
	}
	itemDef {
     	name "SelfBMid"
		rect 18 18 114 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_NOT_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonm.tga"
	}
	itemDef {
     	name "SelfBLeft"
		rect 132 18 16 16 
		visible 1
		decoration
		ownerdraw CG_TEAM_COLORIZED
		ownerdrawflag CG_SHOW_IF_PLYR_IS_NOT_FIRST_PLACE
		style 1
		background "ui/assets/hud/teamonr.tga"
	}
}

// this is the item def for the 1st place text
menuDef {
	name "scores"
	fullScreen MENU_FALSE
	visible MENU_TRUE	
	rect  <?= $menuItem->coordinates->left ?> <?= $baseTop ?> 120 40
    itemdef {
	    name "1stplace"
	    ownerdraw CG_1ST_PLACE_SCORE
   	    rect 10 14 136 40
   	    visible 1
		textscale .22
	    decoration
	}

// this is the item def for the 2nd place text
    itemdef {
	    name "2ndplace"
	    ownerdraw CG_2ND_PLACE_SCORE
   	    rect 10 30 136 40
   	    visible 1
		textscale .22
	    decoration
	}
}