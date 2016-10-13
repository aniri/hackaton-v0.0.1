-- Table: gtfs_bucuresti.links

-- DROP TABLE gtfs_bucuresti.links;

CREATE TABLE gtfs_bucuresti.links
(
  route_id text NOT NULL,
  stop_id text NOT NULL,
  seq integer NOT NULL,
  CONSTRAINT links_pkey PRIMARY KEY (route_id, stop_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gtfs_bucuresti.links
  OWNER TO postgres;
